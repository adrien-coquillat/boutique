<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51IQ8goHUJcyL6Whz7QEL7QxO3rb5MNmdpI4OK3MYpKMMptkhNPEb5lEHmiiiJqcje2lyrPvAMghiHimiEApub4zv00thI9K1yB');
    var elements = stripe.elements();
</script>
<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Validation de commande</h1>
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <?php $price = isset($_POST['price']) ? (int) $_POST['price'] : 0 ?>

    <form class="row" action="index.php?page=charge" method="post" id="payment-form">
        <div class="col-12 col-md-6 form-row">
            <div class="mb-3">
                <label class="form-label" for="card-element">
                    Realiser un paiement de <?= $price ?>,00€ pour votre commande.<br />
                    ex: 4000002500000003 --> Valid card<br />
                    ex: 4000000000009979 --> Stolend card<br />
                </label>
                <div class="form-control" id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <div class="col-2 offset-5">
            <button class="btn btn-custom">Payer</button>
        </div>
    </form>
</div>
<script>
    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.innerHTML = '<div class="alert alert-warning">' + result.error.message + '</div>';
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        var hiddenInputPrice = document.createElement('input');
        hiddenInputPrice.setAttribute('type', 'hidden');
        hiddenInputPrice.setAttribute('name', 'price');
        hiddenInputPrice.setAttribute('value', <?= $price * 100 ?>);
        form.appendChild(hiddenInputPrice);

        // Submit the form
        form.submit();
    }
</script>