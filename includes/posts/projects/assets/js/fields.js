(function($) {
    $(() => {
        const body = $( 'body' );

        body.on( 'change', "#" + assetsData.dateStartId, changeStartDate )
        body.on( 'change', "#" + assetsData.dateEndId, changeEndDate )
    })

    /**
     * Handler for start date change
     * 
     * @param {jQuery.Event} event 
     */
    const changeStartDate = event => {
        const dateEndNode = $( "#" + assetsData.dateEndId );
        dateEndNode
            .attr( 'min', event.target.value )
            .removeAttr( 'readOnly' );  
    }
    
    /**
     * Handler for end date change
     * 
     * @param {jQuery.Event} event 
     */
    const changeEndDate = event => {
        const dateStartNode = $( "#" + assetsData.dateStartId );
        dateStartNode.attr( 'max', event.target.value );
    }
})(jQuery)

