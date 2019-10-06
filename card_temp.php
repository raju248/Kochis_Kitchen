<div class="col-lg-4 col-md-6 col-sm-6 col-8 mb-3 px-3">
    <div class="card" style="width: 100%">
        <div class="img-div">
            <img src="<?php echo $row['DishPhoto']; ?>" class="card-img-top card-img-top-height" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title m-0 "> <?php echo $row['RecipeName']; ?> </h5>
            <hr class="card-hr">

            <div class="card-text">
                <p class=""> <?php echo $row['Description']; ?> </p>
            </div>

            <a href="view_recipe.php?id=<?php echo $row['ID']; ?>" class="btn btn-view" style="width:100%">View full recipe</a>
        </div>
        <div class=" border-top-card  card-footer text-center">

            <?php
            $parent = $row['CreatedDate'];

            $timestamp = strtotime($parent);

            $date = date('Y-m-d', $timestamp); 
            $time = date('H:i a', $timestamp); 

            $date2 = date_create($date);
            $date1 = date_create(date("Y-m-d"));

            $diff = date_diff($date2,$date1);
           
           //echo $diff->days;

            ?>

            <h6 class="p-0 m-0">
                
            <?php 
                if($diff->days==0)
                    echo "Added Today";
                else if($diff->days==1)
                 echo "Added ".$diff->days." day ago"; 
                else
                 echo "Added ".$diff->days." days ago";
            ?> 
            
        </h6>
        </div>
    </div>
</div>