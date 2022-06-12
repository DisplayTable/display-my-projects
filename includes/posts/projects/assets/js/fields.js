(function($) {
    $(() => {
        const body = $( 'body' );
        const selectedIds = document.getElementById(assetsData.issuesSelectdId);
        const selectedHiddenId = document.getElementById(assetsData.issuesSelectdHiddenId);

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

        /**
         * Handler for issue change
         * 
         * @param {jQuery.Event} event 
         */
        const changeIssue = event => {            
            addIssue( selectedIds, event.target.value );
            addIssueToHidden( event.target.value );
        }

        /**
         * Helper to add issue.
         *
         * @param {Node} selectedIds - 
         * @param {String} value - El valor seleccionado.
         */
        const addIssue = ( selectedIds, value ) => {
            const p = document.createElement('p');
            const button = document.createElement('button');
            p.textContent = value;
            button.textContent = '+';
            button.type = 'button';
            button.dataset.id = value;
            p.appendChild(button);
            selectedIds.appendChild(p);
        }

        /**
         * Helper to add issue to hidden field.
         *
         * @param {String} value - El valor seleccionado.
         */
        const addIssueToHidden = value => {            
            const arrPreviousSelected = selectedHiddenId.value.split(',').filter( f => f )
            arrPreviousSelected.push( value )
            selectedHiddenId.value = arrPreviousSelected.join(',');

        }

        /**
         * Handler for remove issue.
         * 
         * @param {jQuery.Event} event 
         */
        const removeIssue = event => {
            const id = event.target.dataset.id;            
            const elToRemove = selectedIds.querySelector('[data-id="' + id + '"]');
            const arrPreviousSelected = selectedHiddenId.value.split(',').filter( f => f )
            selectedHiddenId.value = arrPreviousSelected.filter(f => f !== id).join(',');
            $(elToRemove).closest('p').remove();
        }

        body.on( 'change', "#" + assetsData.dateStartId, changeStartDate )
        body.on( 'change', "#" + assetsData.dateEndId, changeEndDate )
        body.on( 'change', "#" + assetsData.issuesId, changeIssue )
        body.on( 'click', "#" + assetsData.issuesSelectdId + ' p button', removeIssue )
    })
})(jQuery)

