<div class="card">
   
    <div class="card-body">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">SEARCH</button>
        </form>
    </div>


</div>

<hr>




<!-- Blog Categories Well -->
<div class="card">
<div class="card-body ">



    <?php 
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection,$query);         
        ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

                <?php 

        while($row = mysqli_fetch_assoc($select_categories_sidebar )) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<li><a href='/gen/category/$cat_id'>{$cat_title}</a></li>";//category.php?category=
            echo "<br>";

        }
   
                            ?>

            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>
</div>