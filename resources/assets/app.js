var sideDrawer = function(){
    
    var $body = {};
    
    var cacheDom = function(){
      $body = $('body');
    }
    
    var bindEvents = function(){
        var self = this;
        $body.on('click', '.btn-toggle-menu', function(){
            $body.toggleClass('menu-open');
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