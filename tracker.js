/*
* @author: Aamir Khan Jadoon
* This file will handle all ajax calls and dynamic things going on the page
* Time - 12:09 AM 10/30/2019
* */

function build(mode){

    // build data table
    $("#log").load('log.php?mode='+mode);
    tally();

}
function tally(){
    // display tally
    $('#tally').load('log.php?mode=tally');
}



$("document").ready(function () {

    build('build');

    // Refresh page after 30 seconds
    setInterval(function () {

        let mode = $('#btn-mode').data('mode');

        if(mode=='restore'){
            build('build');
        }
        else{
            build('restore');
        }


    },30000);



    //Submit new task
    $('#form-new').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        let data = form.serialize(); // serializing data for sending in request header

        $.ajax({

            url: 'log.php?mode=new',
            data: data, // send data along ajax calls
            success: function () {
                build('build');
            }
        });

    });


    //Stop Task
    $('#log').on('click', '.btn-stop', function(){ // inside log, element containing btn-stop class, execute function when click event occurs.

        let id = $(this).data('id');

        $.ajax({
            url: 'log.php?mode=stop&id='+id,
            success: function(){
                build('build');
            }
        });


    });

    //Remove Task
    $('#log').on('click', '.btn-remove', function(){
       let id = $(this).data('id');

       $.ajax({
           url: 'log.php?mode=remove&id='+id,
           success: function () {
               build('build');
           }
       });
    });

    //Restore tasks
    $('#log').on('click', '.btn-restore', function(){
        let id = $(this).data('id');

        $.ajax({
            url: 'log.php?mode=status&id='+id,
            success: function () {
                build('restore');
            }
        });
    });

    // toggler for restore <-> live
    $('#btn-mode').on('click', function(event){

        event.preventDefault();
        let mode = $(this).data('mode');

        if(mode == 'restore'){

            build('restore');


            $('#lbl-mode').html('Live');
            $(this).data('mode', 'live');

        } else {

            build('build');
            $('#lbl-mode').html('Restore');
            $(this).data('mode', 'restore');

        }
    });


});
