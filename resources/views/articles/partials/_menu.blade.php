<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Basic CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/userprofiles">Users Profile</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/articles">Articles</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/categories">Categories</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/tags">Tags</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/galleries">Galleries</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/images">Images</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($latest != null)
                    <li>
                        {!! link_to_action('ArticlesController@show',$latest->title,[$latest->id]) !!}
                    </li>
                @endif
                <li>
                    <a href="{!!   URL::to('auth/logout')  !!}">logout</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>