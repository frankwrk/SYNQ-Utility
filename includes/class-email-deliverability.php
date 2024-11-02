<?php
namespace SYNQ\UtilitySuite;

class Email_Deliverability {

    public function __construct() {
        add_filter( 'wp_mail', [ $this, 'send_via_resend' ], 10, 1 );
    }

    public function send_via_resend( $args ) {
        $resend_api_key = get_option( 'resend_api_key' );

        if ( ! $resend_api_key ) {
            return $args;
        }

        $response = wp_remote_post( 'https://api.resend.com/v1/send', [
            'headers' => [
                'Authorization' => 'Bearer ' . $resend_api_key,
                'Content-Type'  => 'application/json',
            ],
            'body'    => wp_json_encode( [
                'to'      => $args['to'],
                'subject' => $args['subject'],
                'text'    => $args['message'],
            ] ),
        ] );

        if ( is_wp_error( $response ) ) {
            error_log( 'Resend API error: ' . $response->get_error_message() );
        }

        return $args; // Return args to maintain compatibility.
    }
}

new Email_Deliverability();