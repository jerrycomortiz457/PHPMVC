<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>
    <style>
       #div_pagination{
    /* background-color: #C5C9B8; */
        width: 100%;
        color: #333333;
        /* height: 150px; */
        margin: 0 auto;
        overflow: hidden;
        padding: 10px 0;
        align-items: center;
        justify-content: space-around;
        display: flex;
        float: none;
    }
    </style>
    <script>
        // $(document).ready(function(){
        //     $.get('/main/index_table', function(res){
        //         console.log(res);
        //     });
        // });
    </script>

</head>
<body>
 
    <div id="form">
        <form action="/pagination/search" method="post">
            <input type="text" name="name" id="name" value="">
            <input type="date" name="from_date" id="from_date">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="container" id="div_pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                    echo $page_links;
                ?>   
            </ul>
        </nav>
    </div>

    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Leads ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Registered Datetime</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>           
        <?php 
            foreach($query->result() as $row){
                echo "<tr>
                        <th scope='row'>{$row->leads_id}</th>
                        <td>{$row->first_name}</td>
                        <td>{$row->last_name}</td>
                        <td>{$row->registered_datetime}</td>
                        <td>{$row->email}</td>                       
                    </tr>";
            }
        ?>
        </tbody>
        </table>
    </div>
    <?php
        var_dump($query);
    ?>
    
    <script>
        $(document).ready(function(){
            $(document).find('a').addClass('page-link');
            var page_number = $(document).find('strong').text();
            $(document).find('strong').replaceWith('<li class="page-item active"><a class="page-link">'+page_number+'</a></li>');
        });    
    </script>


    <!-- <h1>Check</h1> -->

</body>
</html>