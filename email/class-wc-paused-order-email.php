<?php
/**
 * Paused Order Email
 *
 * @since 0.1
 * @extends \WC_Email
 */
 
class WC_Paused_Order_Email extends WC_Email {


    /**
     * Set email defaults
     *
     * @since 0.1
     */
    public function __construct() {
        define('WP_DEBUG', true);
        define('WP_DEBUG_LOG', true);
        define('WP_DEBUG_DISPLAY', false);
        error_log("\r\n HELLO \r\n");
        // set ID, this simply needs to be a unique name
        $this->id = 'wc_paused_order';

        // this is the title in WooCommerce Email settings
        $this->title = 'Paused order';

        // this is the description in WooCommerce email settings
        $this->description = 'Paused order';

        // these are the default heading and subject lines that can be overridden using the settings
        $this->heading = 'Paused order';
        $this->subject = 'You are create Paused order';

        // these define the locations of the templates that this email should use, we'll just use the new order template since this email is similar
        $this->template_html  = 'emails/admin-new-order.php';
        $this->template_plain = 'emails/plain/plain/admin-new-order.php';

        // Trigger on confirmed orders
        add_action( 'woocommerce_order_status_pending_to_order_paused', array( $this, 'trigger' ) );
        add_action( 'woocommerce_order_status_processing_to_order_paused', array( $this, 'trigger' ) );

        // Call parent constructor to load any other defaults not explicity defined here
        parent::__construct();

        // this sets the recipient to the settings defined below in init_form_fields()
        $this->recipient = $this->get_option( 'recipient' );

        // if none was entered, just use the WP admin email as a fallback
        if ( ! $this->recipient )
            $this->recipient = get_option( 'admin_email' );

        define('WP_DEBUG', false);
        define('WP_DEBUG_LOG', false);
        define('WP_DEBUG_DISPLAY', true);
    }


    /**
     * Determine if the email should actually be sent and setup email merge variables
     *
     * @since 0.1
     * @param int $order_id
     */
    public function trigger( $order_id ) {
            // bail if no order ID is present
        
        error_log("DateTime()" .' Hello');
        error_log(' HELLO ');
        if ( ! $order_id )
            return;

        if ( $order_id ) {
            $this->object       = wc_get_order( $order_id );
            $this->recipient    = $this->object->billing_email;

            $this->find['order-date']      = '{order_date}';
            $this->find['order-number']    = '{order_number}';

            $this->replace['order-date']   = date_i18n( wc_date_format(), strtotime( $this->object->order_date ) );
            $this->replace['order-number'] = $this->object->get_order_number();
        }


        if ( ! $this->is_enabled() || ! $this->get_recipient() )
            return;

        // woohoo, send the email!
        $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
    }


    /**
     * get_content_html function.
     *
     * @since 0.1
     * @return string
     */
    public function get_content_html() {
        ob_start();
        wc_get_template( $this->template_html, array(
            'order'         => $this->object,
            'email_heading' => $this->get_heading()
        ) );
        return ob_get_clean();
    }


    /**
     * get_content_plain function.
     *
     * @since 0.1
     * @return string
     */
    public function get_content_plain() {
        ob_start();
        wc_get_template( $this->template_plain, array(
            'order'         => $this->object,
            'email_heading' => $this->get_heading()
        ) );
        return ob_get_clean();
    }


    /**
     * Initialize Settings Form Fields
     *
     * @since 2.0
     */
    public function init_form_fields() {

        $this->form_fields = array(
            'enabled'    => array(
                'title'   => 'Enable/Disable',
                'type'    => 'checkbox',
                'label'   => 'Enable this email notification',
                'default' => 'yes'
            ),
            'recipient'  => array(
                'title'       => 'Recipient(s)',
                'type'        => 'text',
                'description' => sprintf( 'Enter recipients (comma separated) for this email. Defaults to <code>%s</code>.', esc_attr( get_option( 'admin_email' ) ) ),
                'placeholder' => '',
                'default'     => ''
            ),
            'subject'    => array(
                'title'       => 'Subject',
                'type'        => 'text',
                'description' => sprintf( 'This controls the email subject line. Leave blank to use the default subject: <code>%s</code>.', $this->subject ),
                'placeholder' => '',
                'default'     => ''
            ),
            'heading'    => array(
                'title'       => 'Email Heading',
                'type'        => 'text',
                'description' => sprintf( __( 'This controls the main heading contained within the email notification. Leave blank to use the default heading: <code>%s</code>.' ), $this->heading ),
                'placeholder' => '',
                'default'     => ''
            ),
            'email_type' => array(
                'title'       => 'Email type',
                'type'        => 'select',
                'description' => 'Choose which format of email to send.',
                'default'     => 'html',
                'class'       => 'email_type',
                'options'     => array(
                    'plain'     => __( 'Plain text', 'woocommerce' ),
                    'html'      => __( 'HTML', 'woocommerce' ),
                    'multipart' => __( 'Multipart', 'woocommerce' ),
                )
            )
        );
    }


} // end \WC_Paused_Order_Email class