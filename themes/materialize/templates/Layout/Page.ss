<style>

    label {
        font-size: 1em;
        /*color: #fff;*/
    }
    #ForgotPassword a {
        float: left;
        color: #ccc;
    }

    .logo {
        margin-top: 1rem;
        border-radius: 1rem;
    }

    .logo i {
        padding: 1.6rem 0 0;
        font-size: 5rem;
    }

    h3 {
        padding-bottom: 1rem;
    }

    p {
        padding: 1rem;
    }

    form .Actions {
        margin: 2rem;
        padding: 0 0 3rem 0;
    }
</style>
<div class="container  ">
    <div class="row">
        <div class="col s12 offset-m2 m8 offset-l2 l8">
            <div class="card center-align logo">
                <div class="card-content">

                    <h3 class="center-align"><a href="/" class="green-text">$SiteConfig.Title</a></h3>
                </div>
            </div>
            <div class="card  z-depth-2">
                $Content

                $Form
            </div>

        </div>
    </div>
</div>