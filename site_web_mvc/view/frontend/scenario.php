

<style>
    .w3-container{
        padding: 0.01em 16px;
    }
    ::before, ::after {
        box-sizing: inherit;
    }
    .w3-container::after, .w3-container::before, .w3-panel::after, .w3-panel::before, .w3-row::after, .w3-row::before, .w3-row-padding::after, .w3-row-padding::before, .w3-cell-row::before, .w3-cell-row::after, .w3-clear::after, .w3-clear::before, .w3-bar::before, .w3-bar::after{
        content: "";
        display: table;
        clear: both;
    }
    .w3-row a{
        color: inherit;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;

    }
    .w3-padding {
        padding: 8px 16px !important;
    }

    .w3-col.m4, .w3-third {
        width: 33.33333%;
    }
    .w3-col, .w3-half, .w3-third, .w3-twothird, .w3-threequarter, .w3-quarter {
        float: left;
        width: 100%;
    }
    *, ::before, ::after {
        box-sizing: inherit;
    }

    .w3-border-red, .w3-hover-border-red:hover {
        border-color: #f44336;
    }
    .w3-padding {
        padding: 8px 16px !important;
    }
    .w3-bottombar {
        border-bottom: 6px solid #ccc !important;
        border-bottom-color: rgb(204, 204, 204);
    }
    .w3-light-grey, .w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover{
        color: #000 !important;
        background-color: #f1f1f1 !important;
    }


</style>

<div class="w3-container">
    <h2>Tabs in a Grid</h2>

    <div class="w3-row">
        <a href="javascript:void(0)" onclick="openCity(event, 'London');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">London</div>
        </a>
        <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Paris</div>
        </a>
        <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Tokyo</div>
        </a>
    </div>

    <div id="London" class="w3-container city" style="display:none">
        <h2>London</h2>
        <p>London is the capital city of England.</p>
    </div>

    <div id="Paris" class="w3-container city" style="display:none">
        <h2>Paris</h2>
        <p>Paris is the capital of France.</p>
    </div>

    <div id="Tokyo" class="w3-container city" style="display:none">
        <h2>Tokyo</h2>
        <p>Tokyo is the capital of Japan.</p>
    </div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-red";
    }
</script>

