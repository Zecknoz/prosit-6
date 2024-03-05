<?php

$numPage = 0;


function printSmiley(){
    global $numPage;
    for ($i=0; $i<256; $i++){
        echo '<p class="">&#' . strval(128512 + $i + (256*$numPage)) . '<p>';
    }
};

function getNextPage($to){
    global $numPage;
    if($to === 'minus'){
        return $numPage + 0;
    }
    if($to === 'plus'){
        return $numPage + 1;
    }
    else{
        return 0;
    }
}

function updatePage(){
    global $numPage;
    return 'Page ' . strval($numPage);
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
            <div class="my-8 flex flex-row space-x-4 place-items-center grow-0 shrink-0 basis-96">
                <a href=<?="index.php?page=" . getNextPage('minus')?> class="flex bg-gray-200 px-2 rounded-md text-gray-600 items-center text-3xl h-1/4"><</a>

                <div class="flex flex-col ">
                    <div class="flex justify-center">
                        <?php 
                            echo(updatePage()) ?>
                    </div>
                    <div class="grid grid-cols-16 gap-2 bg-gray-200 rounded-lg">
                        <?php          

                            global $numPage;

                            if(isset($_GET['page'])){
                                $numPage = $_GET['page'];
                                printSmiley();
                            }else{
                                printSmiley();
                            }
                        ?>
                    </div>
                </div>
                
                <a href=<?="index.php?page=" . getNextPage('plus')?> class="flex bg-gray-200 px-2 rounded-md  text-gray-600 items-center text-3xl h-1/4">></a>
            </div>
        </div>
    </main>
</body>
</html>


