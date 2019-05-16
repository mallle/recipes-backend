<section class="hero is-primary is-medium">
    <!-- Hero header: will stick at the top -->
    <div class="hero-head">
        <header class="nav">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item">
                        <router-link tag="li" to="/" exact>
                            Home
                        </router-link>
                    </a>
                </div>
                <span class="nav-toggle">
					<span></span>
					<span></span>
					<span></span>
				</span>
                <div class="nav-right nav-menu">
                    <a class="nav-item is-active">

                    </a>
                    <a class="nav-item">

                    </a>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
               Meine Rezepte
            </h1>
            <h2 class="subtitle">
                A taste of heaven every day
            </h2>
        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        @include ('frontend.nav')
    </div>
</section>
