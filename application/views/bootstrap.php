<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/css/bootstrap-submenu.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    #primary_nav_wrap ul
    {
        list-style:none;
        position:relative;
        float:left;
        margin:0;
        padding:0
    }

    #primary_nav_wrap ul a
    {
        display:block;
        color:#333;
        text-decoration:none;
        font-weight:700;
        font-size:12px;
        line-height:32px;
        padding:0 15px;
        font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif
    }

    #primary_nav_wrap ul li
    {
        position:relative;
        float:left;
        margin:0;
        padding:0;
        z-index: 999;
    }

    #primary_nav_wrap ul li.current-menu-item
    {
        background:#ddd
    }

    #primary_nav_wrap ul li:hover
    {
        background:#f6f6f6
    }

    #primary_nav_wrap ul ul
    {
        display:none;
        position:absolute;
        top:100%;
        left:0;
        background:#fff;
        padding:0
    }

    #primary_nav_wrap ul ul li
    {
        float:none;
        width:200px
    }

    #primary_nav_wrap ul ul a
    {
        line-height:120%;
        padding:10px 15px
    }

    #primary_nav_wrap ul ul ul
    {
        top:0;
        left:100%
    }

    #primary_nav_wrap ul li:hover > ul
    {
        display:block
    }

    /* List Tree View */
    .treeview, .treeview ul {
        margin:0;
        padding:0;
        list-style:none;

        color: #369;
    }
    .treeview ul {
        margin-left:1em;
        position:relative
    }
    .treeview ul ul {
        margin-left:.5em
    }
    .treeview ul:before {
        content:"";
        display:block;
        width:0;
        position:absolute;
        top:0;
        left:0;
        border-left:1px solid;

        /* creates a more theme-ready standard for the bootstrap themes */
        bottom:15px;
    }
    .treeview li {
        margin:0;
        padding:0 1em;
        line-height:2em;
        font-weight:700;
        position:relative
    }
    .treeview ul li:before {
        content:"";
        display:block;
        width:10px;
        height:0;
        border-top:1px solid;
        margin-top:-1px;
        position:absolute;
        top:1em;
        left:0
    }
    .tree-indicator {
        margin-right:5px;

        cursor:pointer;
    }
    .treeview li a {
        text-decoration: none;
        color:inherit;
        cursor:pointer;
    }

    /* Bootstrap Menu */
    .navbar-nav li:hover{
        cursor: pointer;
    }
    .navbar-nav li:hover > ul.dropdown-menu {
        display: block;
    }
    .dropdown-submenu {
        position:relative;
    }
    .dropdown-submenu>.dropdown-menu {
        top:0;
        left:100%;
        margin-top:-6px;
    }
    .dropdown-menu > li > a:hover:after {
        text-decoration: underline;
        transform: rotate(-90deg);
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim.js/3.3.4/Slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/js/bootstrap-submenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        // Sweet Alert
        $(".delete").on("click", function(){
            swal({
                title: '"' + $(this).data('title') +'"' + " Kategorisi silinsin mi?",
                text: "Silme işlemini gerçekleştirdiğiniz taktirde geri alamazsınız!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Vazgeç!", "Sil"],
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = $(this).data('link');
                }
            });
        });
    });
    $(function () {
        $('.selectpicker').selectpicker();
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-submenu]').submenupicker();
    });
</script>