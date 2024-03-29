(function($) {
  $.fn.sbCustomSelect = function(options) {
    var iOS = (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)),
        android = (navigator.userAgent.match(/Android/i)),
        UP = 38, DOWN = 40, SPACE = 32, RETURN = 13, TAB = 9,
        matchString = '';

    // Sync custom display with original select box and set selected class and the correct <li>
    var updateSelect = function() {
      var $this = $(this),
          $dropdown = $this.siblings('.sb-dropdown'),
          $sbSelect = $this.siblings('.sb-select');
          
      $sbSelect.val(this[this.selectedIndex].innerHTML);
      
      $dropdown.children().removeClass('selected')
        .filter(':contains(' + this[this.selectedIndex].innerHTML + ')').addClass('selected');
    };
    
    // Update original select box, hide <ul>, and fire change event to keep everything in sync
    var dropdownSelection = function(e) {
      var $target = $(e.target),
          $option = $target.closest('.sb-custom').find('option').filter(':contains(' + $target.text() + ')');
          
      e.preventDefault();
      
      $option[0].selected = true;
      $target.closest('ul').fadeOut('fast');
      $option.parent().trigger('change');
    };
    
    // Create the <ul> that will be used to change the selection on a non iOS/Android browser
    var createDropdown = function($select) {
      var $options = $select.children(),
          $dropdown = $('<ul class="sb-dropdown"/>');
      
      $options.each(function() {
        $dropdown.append('<li><a href=".">' + $(this).text() + '</a></li>');
      });
      $dropdown.bind('click', dropdownSelection);
      
      return $dropdown;
    };
    
    // Clear keystroke matching string and show dropdown
    var viewList = function(e) {
      var $this = $(this);
      clear();

      $this.closest('.sb-custom').find('.sb-dropdown').fadeIn('fast');
      
      e.preventDefault();
    };
    
    // Hide the custom dropdown
    var hideDropdown = function(e) {
      if (!$(e.target).closest('.sb-custom').length) {
        $('.sb-dropdown').fadeOut('fast');
      } 
    };
    
    // Manage keypress to replicate browser functionality
    var selectKeypress = function(e) {
      var $this = $(this),
          $current = $this.siblings('ul').find('.selected');
      
      if ((e.keyCode == UP || e.keyCode == DOWN || e.keyCode == SPACE) && $current.is(':hidden')) {
        $current.focus();
        return;
      }
      
      if (e.keyCode == UP && $current.prev().length) {
        e.preventDefault();
        $current.removeClass('selected');
        $current.prev().addClass('selected');
      } else if (e.keyCode == DOWN && $current.next().length) {
        e.preventDefault();
        $current.removeClass('selected');
        $current.next().addClass('selected');
      }
      
      if (e.keyCode == RETURN || e.keyCode == SPACE) {
        $current.trigger('click');
        return;
      }
      
      if (e.keyCode >= 48 && e.keyCode <= 90) {
        matchString += String.fromCharCode(e.keyCode);
        checkforMatch(e);
      }
      
      if (e.keyCode == TAB && $current.is(':visible')) {
        e.preventDefault();
        $current.trigger('click');
        hideDropdown(e);
      }
    };
    
    // Check keys pressed to see if there is a text match with one of the options
    var checkforMatch = function(e) {
      
      var re = '/' + matchString + '.*/';
      
      $(e.target).siblings('ul').find('a').each(function() {
        if (this.innerHTML.toUpperCase().indexOf(matchString) === 0) {
          $(this).trigger('click');
          return;
        }
      });
    };
    
    // Clear the string used for matching keystrokes to select options
    var clear = function() {
      matchString = '';
    };
    
    
    
    /* jQuery Plugin Loop
     *
     * Take the select box out of the tab order.
     *
     * Add the field that will show the currently selected item and attach the change event to update the .sb-select input.
     *
     * If this is iOS or Android then we want to use the browsers standard UI controls. Set the opacity of the select to 0
     * and lay it over our custom display of the current value.
     * Otherwise, we're going to create a custom <ul> for the dropdown
     *
     * After all of the setup is complete, trigger the change event on the original select box to update the .sb-select input
     */
    this.each(function() {
      var $self = $(this);

      $self.attr('tabindex', -1)
        .wrap('<div class="sb-custom"/>')
        .after('<input type="text" class="sb-select" readonly="readonly" />')
        .bind('change', updateSelect);
      
      
      if (iOS || android) {
        $self.show().css({
          'display': 'block',
          'opacity': 0,
          'position': 'absolute',
          'width': '100%',
          'z-index': 1000
        });
      } else {
        
        $self.next().bind('click', viewList).after(createDropdown($self));
      }

      $self.trigger('change');
    });
    
    // Hide dropdown when click is outside of the input or dropdown
    $(document).bind('click', hideDropdown);
    
    $('.sb-custom').find('.sb-select').live('keydown', selectKeypress);
    $('.sb-custom').bind('blur', clear);
    $('.sb-dropdown').live('focus', viewList);
    
    return this;
  };
})(jQuery);

