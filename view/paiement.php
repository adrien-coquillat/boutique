<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51IQ8goHUJcyL6Whz7QEL7QxO3rb5MNmdpI4OK3MYpKMMptkhNPEb5lEHmiiiJqcje2lyrPvAMghiHimiEApub4zv00thI9K1yB');
    var elements = stripe.elements();
</script>
<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/paiement.jpg">
        <h1 class="title-screen__title">Paiement</h1>
    </section>
</div>
<div class="container-fluid">
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>


    <?php $price = isset($_POST['price']) ? (int) $_POST['price'] : 0 ?>
    <form class=" row justify-content-center" action="index.php?page=charge" method="post" id="payment-form">
        <fieldset class="col-md-8">
            <h2>Validation de votre commande</h2>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Adresse de livraison: </label>
                <input type="text" name="adresse_u" class="form-control" value="">
            </div>

            <div class="col-12  form-row">
                <div class="mb-3">
                    <label class="form-label" for="card-element">
                        Realiser un paiement de <?= $price ?>,00€ pour votre commande (4000002500000003).<br />
                    </label>
                    <div class="form-control" id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                </div>

                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
            </div>


            <div class="row justify-content-center">
                <button class="col-6 btn btn-light btn-custom">Payer</button>
            </div>
        </fieldset>
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