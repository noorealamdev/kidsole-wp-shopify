<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'KidsolePipeDriveApi' ) ) {
	class KidsolePipeDriveApi {

		protected static $instance = null;

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function initialize() {
			add_action( 'wp_ajax_nopriv_ajax_submit_form', [$this, 'ajax_submit_form'] );
			add_action( 'wp_ajax_ajax_submit_form', [$this, 'ajax_submit_form'] );

			add_shortcode( 'cliniciansForm', [$this, 'clinicians_form_html_shortcode'] );
			
		}

		public function clinicians_form_html_shortcode( ) {

			ob_start();
			?>

			<div class="container">
				<div class="row pd-0 mt-2">

					<form method="post" id="cliniciansForm" action="<?php echo admin_url('admin-ajax.php'); ?>">
						<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('submit_form'); ?>" />
						<div class="mb-3">
							<input type="text" name="clinicName" class="form-control" placeholder="Please Enter Your Clinic or Provider Name*" required>
						</div>
						<div class="mb-3">
							<input type="text" name="email" class="form-control" placeholder="Your Email*" required>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" name="numberOfClinic" placeholder="Number of Clinics/Offices">
						</div>
						<div class="mb-3">
							<input type="text" name="phoneNumber" class="form-control" placeholder="Your Phone Number*" required>
						</div>
						<div class="mb-3">
							<input type="text" name="streetAddress" class="form-control" placeholder="Street Address*" required>
						</div>
						<div class="mb-3">
							<input type="text" name="city" class="form-control" placeholder="City*" required>
						</div>
						<div class="mb-3">
							<input type="text" name="state" class="form-control" placeholder="State*" required>
						</div>
						<div class="mb-3">
							<input type="text" name="zip" class="form-control" placeholder="Zip*" required>
						</div>
						<div class="mb-3">
							<textarea name="monthlyRecommend" rows="2" cols="52" style="width: 100%; border-radius: 6px;" placeholder="If your clinic had a genuinely affordable option for pediatric insoles, how many might you recommend in a typical month?"></textarea>
						</div>
						<div class="mb-3">
							<textarea name="comments" rows="4" cols="52" placeholder="Any Special Notes or Comments" style="width: 100%; border-radius: 6px;"></textarea>
						</div>
						<div class="mt-3">
							<button type="submit" class="btn btn-primary px-4 fw-bold">Submit Order</button>
						</div>
					</form>


					<div class="sending-data-loader mt-2" style="display: none">Sending data...</div>

					<div class="errorMessage alert alert-danger mt-3" style="display: none">Data sending failed! please try again.</div>


					<!-- Modal -->
					<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-primary" id="exampleModalLabel">Thank you</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<p>Your order data successfully sent.</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

            <script>
                jQuery(document).ready(function($) {
                    $('#cliniciansForm').submit(function(e) {
                        e.preventDefault();

                        $(".sending-data-loader").show();

                        var ajaxurl = $(this).attr('action');
                        var nonce = $(this).find('input[name="nonce"]').val();
                        // all form data
                        var clinicName = $('#cliniciansForm').find('input[name="clinicName"]').val();
                        var email = $('#cliniciansForm').find('input[name="email"]').val();
                        var numberOfClinic = $('#cliniciansForm').find('input[name="numberOfClinic"]').val();
                        var phoneNumber = $('#cliniciansForm').find('input[name="phoneNumber"]').val();
                        var streetAddress = $('#cliniciansForm').find('input[name="streetAddress"]').val();
                        var city = $('#cliniciansForm').find('input[name="city"]').val();
                        var state = $('#cliniciansForm').find('input[name="state"]').val();
                        var zip = $('#cliniciansForm').find('input[name="zip"]').val();
                        var monthlyRecommend = $('#cliniciansForm').find('textarea[name="monthlyRecommend"]').val();
                        var comments = $('#cliniciansForm').find('textarea[name="comments"]').val();

                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            data: {
                                action: 'ajax_submit_form',
                                nonce,
                                clinicName,
                                email,
                                numberOfClinic,
                                phoneNumber,
                                streetAddress,
                                city,
                                state,
                                zip,
                                monthlyRecommend,
                                comments
                            },
                            success: function(response) {
                                $(".sending-data-loader").hide();
                                console.log(response)
                                if (response.success) {
                                    $("#responseModal").modal('show');
                                    setTimeout(function(){
                                        $("#responseModal").modal('hide');
                                    }, 4000);
                                    $("#cliniciansForm")[0].reset();
                                }
                                else {
                                    $(".errorMessage").css({'display':'block'})
                                }
                            },
                            error: function (req, err) {
                                $(".errorMessage").css({'display':'block'})
                            }
                        });
                    });
                });
            </script>

			<?php
			return ob_get_clean();

		}


		public function ajax_submit_form() {

			if ( ! wp_verify_nonce( $_POST['nonce'], 'submit_form' ) ) {
				wp_send_json( ['success' => false, 'message' => 'Nonce is not valid, try again'] );
			}

			$clinicName = $_POST['clinicName'];
			$email = $_POST['email'];
			$numberOfClinic = $_POST['numberOfClinic'];
			$phoneNumber = $_POST['phoneNumber'];
			$streetAddress = $_POST['streetAddress'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$monthlyRecommend = $_POST['monthlyRecommend'];
			$comments = $_POST['comments'];

			$pipeDriveApiToken = '0468e3570b95b0f2d2aa33fb2c2b50b327cc7a07';
			$pipeDriveUrl = 'https://kidsole.pipedrive.com/v1/persons?api_token='.$pipeDriveApiToken.'';

			$pipeDriveRequestBody = [
				'6c82053acbe9d12fee1774d87572f3a12050913f' => $streetAddress,
				'140c4c45ee01839eb7b3b6ef65f01aeb8a56c5be' => $city,
				'7450899fec45672ad0cb35fa3faf84f3eb2af6f7' => $clinicName,
				'a3580af09844d8825092ef5981f1235aea60a82f' => $comments,
				'393b6fcac82571baf7564372818f88de570d549f' => $numberOfClinic,
				'c223c7b1c489526083d1fa2f9d2dabaa28ee66ec' => $state,
				'a92a88fbbbcb99ce349b28b3dba2b1cb1b7fd60a' => $zip,
				'de4aacff2299b1352d47d3593648f1a588c70299' => $monthlyRecommend,
				'56a8100fcaac9bf997b222f7cb45b5c535b7556b' => 'KidSole Web Site Lead',
				'email' => $email,
				'phone' => $phoneNumber,
				'name' => $clinicName
			];

			$responsePipeDrive = wp_remote_post( $pipeDriveUrl, array(
				'body'    => $pipeDriveRequestBody
			));

			if ( is_wp_error( $responsePipeDrive ) ) {
				$error_message = $responsePipeDrive->get_error_message();
				wp_send_json( ['success' => false, 'message' => $error_message] );
			}
			
			/**
             * Send form data to email.
             */
            $to = array ( 'josh@kidsole.com', 'ed@kidsole.com' );
			//$to = 'support@kidsole.com';
            $subject = 'KidSole Web Site Lead';
            $message = 'Email is come from the <a target="_blank" href="https://kidsole.com/pages/clinicians-insole-demo-program">Clinicians page.</a> Form details are below: <br><br>';
            $message .= '<strong>Clinic Name: </strong>'. $clinicName .'<br><br>';
            $message .= '<strong>Email: </strong>'. $email .'<br><br>';
            $message .= '<strong>Number of Clinic: </strong>'. $numberOfClinic .'<br><br>';
            $message .= '<strong>Street Address: </strong>'. $streetAddress .'<br><br>';
            $message .= '<strong>City: </strong>'. $city .'<br><br>';
            $message .= '<strong>State: </strong>'. $state .'<br><br>';
            $message .= '<strong>Zip: </strong>'. $zip .'<br><br>';
            $message .= '<strong>Monthly Recommend: </strong>'. $monthlyRecommend .'<br><br>';
            $message .= '<strong>Comments: </strong>'. $comments;
            
            $headers = "From: Custom Email SMTP Server <no-reply@codenpy.com>";
            
            wp_mail( $to, $subject, $message, $headers );
			

			// Create Shopify order via API
			$shopifyApiUrl = 'https://kidsoles.myshopify.com/admin/api/2023-01/orders.json';
			$shopifyRequestBody = json_encode( [
				'order' => [
					'line_items' => [
						[
							'variant_id' => 43708237971682,
							'quantity' => 1
						]
					],
					'email' => $email,
					'note' => 'Order Details: '.$clinicName.', '.$email.', '.$numberOfClinic.', '.$phoneNumber.', '.$streetAddress.', '.$city.', '.$state.', '.$zip.', '.$monthlyRecommend.', '.$comments,
					'fulfillment_status' => 'fulfilled',
					'send_receipt' => true,
					'send_fulfillment_receipt' => true,
				]
			]);

			$responseShopify = wp_remote_post( $shopifyApiUrl, array(
				'headers' => array(
					'Content-Type' => 'application/json',
					'X-Shopify-Access-Token' => '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'
				),
				'body'    => $shopifyRequestBody
			));

			if ( is_wp_error( $responseShopify ) ) {
				$error_message = $responseShopify->get_error_message();
				wp_send_json( ['success' => false, 'message' => $error_message] );
			}


			wp_send_json( ['success' => true, 'message' => 'Data has been sent successfully'] );
			wp_die();
		}


	}

}