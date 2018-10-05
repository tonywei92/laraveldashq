var sideDrawer = function(){

    var $body = {};
    var $listAction = {}
    var cacheDom = function(){
        $body = $('body');
    }

    var bindEvents = function(){
        var self = this;

        $body.on('click', '.btn-toggle-menu', function(e){
            e.preventDefault();
            $body.toggleClass('menu-open');
        });

        $body.on('click', '.card__list__item .btn-expand', function(e){
            e.preventDefault();
            $(this).closest('.card__list__item').removeClass('card__list__item--collapsed');
        });

        $body.on('click', '.card__list__item .btn-compress', function(e){
            e.preventDefault();
            $(this).closest('.card__list__item').addClass('card__list__item--collapsed');
        });

    }

    var init = function(){
        cacheDom();
        bindEvents();
    }

    return {
        init: init
    }
}

sideDrawer().init();


var cardList = function(){
    var $listAction = {};
    var cacheDom = function(){
        $listAction = $('.card__list__action');
    }
    var bindEvents = function(){
        $listAction.on('click', '.btn-uncheckall', function(e){
            e.preventDefault();
            $(this).closest('.card__list').find('.card__list__item__checkbox').prop('checked',false);
        });

        $listAction.on('click', '.btn-checkall', function(e){
            e.preventDefault();
            $(this).closest('.card__list').find('.card__list__item__checkbox').prop('checked',true);
        });

        $('.card__list__item__header__action').on('click', '.card__list__item__header__action__delete', function(e){
            var id = $(this).closest('.card__list__item').data('id');
            if(!confirm('Delete job with id ' + id + '?')){
                e.preventDefault();
            }
        });
        var populateCheckedIds = function(context) {
            var $checkboxes = $(context).closest('.card__list').find('.card__list__item__checkbox');
            var data = {};
            $.each($checkboxes, function(index, value){
                if($(value).is(':checked')){
                    data['ids[' + index + ']'] = $(value).closest('.card__list__item').data('id');    
                }
            } )
            return data;
        }
        //
        //        $('.card__list__item__header__action').on('click', '.card__list__item__header__action__retry', function(e){
        //            e.preventDefault();
        //            alert($(this).closest('.card__list__item').data('id'));
        //        });

        $listAction.on('click', '.btn-delete-selected', function(e){
            e.preventDefault();
            $checkboxes = $(this).closest('.card__list').find('.card__list__item__checkbox');
            $checkedCount = $checkboxes.filter(':checked').length;
            if($checkedCount){
                if(confirm('Delete selected item(s)?')){
                    if(page == 'failedjobs'){
                        submit(deleteFailedJobsUrl,(populateCheckedIds(this)));    
                    }
                    if(page=='jobs'){
                        submit(deleteJobsUrl,(populateCheckedIds(this)));    
                    }

                };
            }
            else{
                alert('No item selected');
            }
        });
        $listAction.on('click', '.btn-retry-selected', function(e){
            e.preventDefault();
            $checkboxes = $(this).closest('.card__list').find('.card__list__item__checkbox');
            $checkedCount = $checkboxes.filter(':checked').length;
            if($checkedCount){
                if(confirm('Retry selected item(s)?')){
                    if(page == 'failedjobs'){
                        submit(retryFailedJobsUrl,(populateCheckedIds(this)));
                    }
                };
            }
            else{
                alert('No item selected');
            }
        });

        $listAction.on('click', '.btn-retry-all', function(e){
            if(!confirm('Retry all jobs?')){
                e.preventDefault();
            }
        });
        $listAction.on('click', '.btn-delete-all', function(e){
            if(!confirm('Delete all jobs?')){
                e.preventDefault();
            }
        });


    }
    var init = function(){
        cacheDom();
        bindEvents();
    }

    return {
        init: init
    }
}

cardList().init();

$.fn.modal = function(options){
    var self = this;
    if(options==='toggle' && $(this).hasClass('modal')){
        this.toggleClass('open');
    }
    else
    {
        this.find('.modal__close').on('click', function(e){
            e.preventDefault();
            self.modal('toggle');
        });
    }
}


var global = function(){
    var $body = {};
    var cacheDom = function(){
        $('.modal').modal();
        $body = $('body');
    }

    var bindEvents = function(){
        $body.on('click', '.toggle-about-modal', function(e){
            e.preventDefault();
            $('#about-modal').modal('toggle');
        });
    }

    var init = function(){
        cacheDom();
        bindEvents();
    }

    return {
        init: init
    }
}

global().init();

var well = function(){
    var bindEvents = function(){
        $('body').on('click', '.well__delete', function(e){
            e.preventDefault();
            $(this).closest('.well').remove();
        });
    }
    var init = function(){
        bindEvents();
    }
    return {
        init: init
    }
}

well().init();

var submit = function(url,fields){
    var token = $('meta[name=csrf-token]').attr("content");
    var $form = $('<form>', {
        action: url,
        method: 'post'
    });
    $.each(fields, function(key, val) {
        $('<input>').attr({
            type: "hidden",
            name: key,
            value: val
        }).appendTo($form);
    });

    $('<input>').attr({
        type: "hidden",
        name: '_token',
        value: token
    }).appendTo($form);
    
    $form.appendTo('body').submit();
}