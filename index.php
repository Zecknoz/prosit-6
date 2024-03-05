<?php
$numPage = 0;

function printSmiley(){
    global $numPage;
    for ($i=0; $i<256; $i++){
        echo '<div>&#' . strval(128512 + $i + (256*$numPage)) . '</div>';
    }
};

function getNextPage($to){
    global $numPage;
    if($to === 'minus'){
        
        return $_GET['page'] - 1;
    }
    if($to === 'plus'){
        return $numPage + 1;
    }
    else{
        return 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./tailwind/output.css" rel="stylesheet">
    <title>Prosit 6</title>
</head>
<body>
    <head>
        <div class="flex flex-row items-end space-x-4 justify-center m-4">
            <h1 class="text-3xl font-bold underline">Prosit 6</h1>
            <p>Les smileys <span><?php echo "&#128512"?></span></p>
        </div>
    </head>
    <main>
        <div class="flex justify-center">
            <div class="my-4 flex flex-row space-x-4 place-items-center">
                <a href=<?="index.php?page=" . getNextPage('minus')?> class="flex bg-gray-200 px-2 rounded-md text-gray-600 items-center text-3xl h-1/4 hover:bg-gray-300 hover:text-white"><</a>

                <div class="flex flex-col ">
                    <div class="flex justify-center">
                        <?php 
                        if(isset($_GET['page'])){
                            echo('Page ' . strval($_GET['page']));
                        }else{
                            echo 'Page 0';
                        }
                        ?>
                    </div>
                    <div class="grid grid-cols-16 gap-3 bg-gray-200 rounded-lg">
                        <?php          
                            global $numPage;
                            if(isset($_GET['page'])){
                                $numPage = $_GET['page'];
                                printSmiley();
                            }else{
                                $numPage = 0;
                                printSmiley();
                            }
                        ?>
                    </div>
                </div>  
                <a href=<?="index.php?page=" . getNextPage('plus')?> class="flex bg-gray-200 px-2 rounded-md  text-gray-600 items-center text-3xl h-1/4 hover:bg-gray-300 hover:text-white">></a>
            </div>
        </div>
    </main>
</body>
</html>


