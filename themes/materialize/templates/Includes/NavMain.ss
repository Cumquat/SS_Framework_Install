<ul id="dropdown1" class="dropdown-content">
    <li><a href="/data/"><i class="small material-icons left">dashboard</i>Dash</a></li>
       <li class="divider"></li>
    <li><a href="data/searchcheck"><i class="small material-icons left green-text">add</i>TBC</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <% if $SiteAdmin %>
        <li><a href="/admin"><i class="small material-icons left">settings</i> Admin</a></li>
    <% end_if %>
    <li><a href="Security/logout?BackURL=%2F"><i class="small material-icons left">eject</i> Logout</a>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="/data/" class="brand-logo">$SiteConfig.Title</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
<% if $CurrentMember %>
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button" href="/" data-activates="dropdown1">Menu 1<i class="material-icons right">arrow_drop_down</i></a></li>
            <% if $CurrentMember %>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2"> Hi, $CurrentMember.FirstName<i class="material-icons right">arrow_drop_down</i></a></li>
            <% end_if %>
        </ul>
        <!--Sidebar menu-->
        <ul class="side-nav" id="mobile-demo">
            <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header">Asset<i class="mdi-navigation-arrow-drop-down"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#">Item 1</a></li>
                            <li><a href="#">Item 2</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            </li>
        </ul>
    </div>
<% end_if %>
</nav>