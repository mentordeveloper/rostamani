/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


//$('.multiselect').multiselect();
//$('.multiselect').multiselect({
//});

$('.searchable').multiSelect({
  selectableHeader: "<label class='control-label' for='description'>Users</label><input type='text' style='margin-bottom:5px' class='form-control search-input input-large' autocomplete='on' placeholder='Enter Name'>",
  selectionHeader: "<label class='control-label' for='description'>Passed Users</label><input type='text' style='margin-bottom:5px' class='form-control search-input input-large' autocomplete='on' placeholder='Enter Name'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});