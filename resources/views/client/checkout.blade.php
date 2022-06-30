<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    <form action="{{ route('payment') }}">
        @csrf
        <input id="payment_method" name="payment_method" type="hidden">
        <input id="card-holder-name" type="text">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button id="card-button">
            Process Payment
        </button>
    </form>


    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe(' {{ env('STRIPE_KEY') }} ');

        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
            }
        });

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();

            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                alert(error);
            } else {
                // The card has been verified successfully...
                document.getElementById('payment_method').value = paymentMethod.id;
            }

            document.querySelector('form').submit();
        });
    </script>
</body>
</html>
