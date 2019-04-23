
 <?php include "includes/admin_header.php"?>

 
        <?php include "includes/admin_upr_navigation.php"?>
        
      
        
        
        <div class="container-fluid">
            <div class="row">  
              
            
              
               <!-- side navbar  -->
               <?php include "includes/admin_navigation.php"?>
             <!--   sidenav bar end -->
               
               
               <div class="col-sm-10 col-xs-10">
                         
                        
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 80rem; height:132px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3">
                      <i class="far fa-file-alt" style="font-size:70px;"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
 <div class='huge' style='font-size:30px;'><?php echo $post_count =  recordCount('post');?> </div>
                        
                      
                  
                        <div style="font-size:30px;">Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="card-link bg-light card-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-success mb-3" style="max-width: 80rem; height:132px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
 <div class='huge' style='font-size:30px;'><?php echo $comment_count =  recordCount('comments');?> </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
              <div class="card-link bg-light card-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-warning mb-3" style="max-width: 80rem; height:132px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<div class='huge' style='font-size:30px;'><?php echo $users_count =  recordCount('users');?> </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="card-link bg-light card-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-danger mb-3" style="max-width: 80rem; height:132px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
<div class='huge' style='font-size:30px;'><?php echo $category_count =  recordCount('categories');?> </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
               <div class="card-link bg-light card-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
       
    </div>
   
     
</div><br>
                <!-- /.row -->
    <div class="row">
                          <?php
        
        
        $unapprove_count = checkStatus('comments','comment_status','unapproved');

        
         
        $published_post_count = checkStatus('post','post_status','published');

        
       
        $approve_count = checkStatus('comments','comment_status','approved');
        
        
        
        $visitor_count = checkStatus('users','user_role','visitor');
        
        
        
        
        ?>
                           
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php 
 $element_text = 
 ['Activepost',
  'Comment',
  'Approvecomments',
  'Users','Categories',
  'Visitors',
  'Published Post','Unapprovedcomments'
];
$element_count = [$post_count,$comment_count,
                  $approve_count,$users_count,
                  $category_count,
                  $visitor_count,
                  $published_post_count,$unapprove_count];
            
            for($i =0;$i < 8; $i++){
                
                echo "['$element_text[$i]'" ."," . "$element_count[$i]],";
                
            }
            
            
            
            ?>
            
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                          
                          
<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                           
                           
                       </div>
                   
                   
                   
               </div>
           
                       
                       
                       <!-- main row ending here -->
                       </div>
                     
                
         <!--   main container ending here  -->                                 
    </div>
         <?php include "includes/admin_footer.php"?>

           
          

