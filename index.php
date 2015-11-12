<html>
<head>
    <!-- Import Google Icon Font -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Import materialize.css -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!-- Let browser know website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>GCM Sender</title>
</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="#" onclick="location.reload();" class="brand-logo">GCM SENDER</a>
    </div>
</nav>

<div class="container">
    <div class="section">

        <!-- User List -->
        <div class="row">
            <ul class="collection with-header" id="usuarios">
                <li class="collection-header"><h5>Users</h5></li>
            </ul>
        </div>

        <div class="row">
            <h5>Message Details</h5>
        </div>

        <div class="row">
            <div class="row">
                <!-- Message Type -->
                <div class="input-field col s12 l2">
                    <select id="message_type">
                        <option value="notification" selected>Notification</option>
                        <option value="data">Data</option>
                    </select>
                    <label>Message Type</label>
                </div>

                <!-- Time to Live -->
                <div class="input-field col s12 l2">
                    <input placeholder="2419200" id="time_to_live" type="number" min="1" max="2419200">
                    <label for="time_to_live">Time to Live (seconds)</label>
                </div>

                <!-- Collapse Key -->
                <div class="input-field col s12 l3">
                    <input id="collapse_key" type="text">
                    <label for="collapse_key">Collapse Key</label>
                </div>

                <!-- Restricted Package Name -->
                <div class="input-field col s12 l3">
                    <input id="restricted_package_name" type="text">
                    <label for="restricted_package_name">Restricted Package Name</label>
                </div>

                <!-- Delay While Idle -->
                <div class="input-field col s12 l2">
                    <input type="checkbox" class="filled-in" id="delay_while_idle" checked/>
                    <label for="delay_while_idle">Delay While Idle</label>
                </div>

                <!-- Title -->
                <div class="input-field col s12 l4">
                    <input id="title" type="text">
                    <label for="title">Title</label>
                </div>

                <!-- Body -->
                <div class="input-field col s12 l8">
                    <input id="body" type="text" length="140"/>
                    <label for="body">Body</label>
                </div>

                <!-- Action -->
                <div class="input-field col s12 l4">
                    <input id="click_action" type="text">
                    <label for="click_action">Action</label>
                </div>

                <!-- Notification TAG -->
                <div class="input-field col s12 l2">
                    <input id="tag" type="text">
                    <label for="tag">TAG</label>
                </div>

                <!-- Icon -->
                <div class="input-field col s12 l2">
                    <select id="icon">
                        <option value="ic_default" selected>Default</option>
                        <option value="ic_cart">Cart</option>
                        <option value="ic_clock">Clock</option>
                        <option value="ic_favorite">Favorite</option>
                    </select>
                    <label>Icon</label>
                </div>

                <!-- Icon Color -->
                <div class="input-field col s12 l4">
                    <select id="color">
                        <option value="" selected>Default</option>
                        <option value="#03A9F4">Blue</option>
                        <option value="#303F9F">Indigo</option>
                        <option value="#FF5252">Red</option>
                        <option value="#795548">Brown</option>
                    </select>
                    <label>Icon Color</label>
                </div>

                <!-- Extras -->
                <div class="input-field col l12 s12">
                    <textarea id="extras" class="materialize-textarea" length="1024"></textarea>
                    <label for="extras">Extras (JSON)</label>
                </div>
            </div>
        </div>

        <!-- Send -->
        <div class="row">
            <button class="btn waves-effect waves-light" onclick="send_msg();">Send
                <i class="material-icons right">send</i>
            </button>
        </div>

        <div class="row" id="answer"></div>
    </div>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="assets/scripts.js"></script>
</body>
</html>