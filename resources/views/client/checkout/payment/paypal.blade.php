@extends('layouts.client-layout')

@section('content')
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id={{$clientId}}&currency=EUR"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            let buttons;
            let hasRendered = false;

            function renderButtons() {
                if (buttons && buttons.close && hasRendered) {
                    buttons.close();
                    hasRendered = false;
                }

                buttons = window.paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '77.44' // Can also reference a variable or function
                                }
                            }]
                        });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            // Successful capture! For dev/demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            const transaction = orderData.purchase_units[0].payments.captures[0];
                            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                            // When ready to go live, remove the alert and show a success message within this page. For example:
                            // const element = document.getElementById('paypal-button-container');
                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            // Or go to another URL:  actions.redirect('thank_you.html');
                        });
                    }
                });

                buttons.render('#paypal-button-container')
                    .then(() => {
                        hasRendered = true;
                    })
                    .catch(err => {
                        console.log("ERROR: " + err);
                        throw new Error(err);
                    });
            }

            document.addEventListener("DOMContentLoaded", function () {
                renderButtons();
            });
        </script>
    </div>
@endsection
