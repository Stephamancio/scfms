<style>
    #sidebar ul.lead{
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }
    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #000;
        text-decoration: none;
    }
    #sidebar a:hover{
        background: gray;
    }
    #sidebar ul li.active>a,
    a[area-expanded="true"] {
        color: #fff;
        background: gray;
    } 
</style>

<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""><i class="fa fa-line-chart"></i> Dashboard</a>
        </li>
        <li>
            <a href=""><i class="fa fa-user"></i> Profile</a>
        </li>
        <li>
            <a href=""><i class="fa fa-cutlery"></i> List of Foods</a>
        </li>
        <li>
            <a href=""><i class="fa fa-list-ul"></i> List of Students</a>
        </li>
    </ul>
</nav>