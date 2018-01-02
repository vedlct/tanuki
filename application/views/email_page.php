<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
        margin-bottom: 50px;
        border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
    .jumbotron {
        margin-bottom: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
        background-color: #37454D;
        color:#fff;
        padding: 10px;
    }
</style>

<div style="background-color:lightgrey" class="text-center">
    <!-- Give full URL -->
    <img alt="StudentsBlog100" class="img-responsive" src="http://1.bp.blogspot.com/-GHK3MiuSKsE/VKYHzyyhtcI/AAAAAAAABms/zayPEcQVP_I/s1600/SB100%2Bcopy.png" title="Studentsblog100">
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="font-weight:bold"><!--php if(isset($subject)) { echo $subject; }?--></h3>
            <p><!--php if(isset($description)) { echo $description; }?--></p>
            <p><?php foreach($allitem as $u){
                    echo $u->itemName;
                    } ?></p>
        </div>
    </div>
</div>


<footer class="container-fluid text-center">
    © W3schools100
</footer>