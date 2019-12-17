$(function(){ // Start this function when DOM is ready
    // Prevent post on enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $tagArray = [];
    // Start click Listener
    $('#add_search_tag').click(function(e){

        // Take tag value and append in list
        let tagFieldValue = $('.tag').val();

        // Start when value isn't empty
        if(tagFieldValue != ''){
            // Find ul-list and make li
            let tagList = $('.tag-list');
            let listItem = $('<li />',{
                class: "tag-item"
                // ,text: tagFieldValue
            });
            // Make link for removing a tag
            let removeListItem = $("<a />", {
                href: 'javascript:void(0);',
                class: 'remove'
                ,text: tagFieldValue
            });
            // Push value into array
            $tagArray.push(tagFieldValue);
            // Append li into ul and clear value
            removeListItem.appendTo(listItem);
            listItem.appendTo(tagList);
            $('.tag').val('');

            $('#tags-hidden').val($tagArray);
            console.log("hidden input value: " + $('#tags-hidden').val());
        }
        e.preventDefault();
    })

    $('.tag-list').on('click',"a.remove", function(e){
        console.log("tester");
        alert($(this).parent().text());

        e.preventDefault();
    })
});