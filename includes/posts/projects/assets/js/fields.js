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
         * Helper to add issue.
         *
         * @param {Node} selectedIds - 
         * @param {String} value - El valor seleccionado.
         */
         const addIssue = ( selectedIds, id, value ) => {
            const p = document.createElement('p');
            const button = document.createElement('button');
            p.textContent = value;
            button.textContent = '+';
            button.type = 'button';
            button.dataset.id = id;
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

        /**
         * Jquery UI Autocomplete.
         */
        $( "#" + assetsData.issuesId ).autocomplete({
            source: function( request, response ) {
                $.get( 
                    assetsData.url, 
                    { action: assetsData.action, term: request.term, nonce: assetsData.nonce }, 
                    data => { 
                        response( JSON.parse( data ) ) 
                    } 
                );
            },
            minLength: 2,
            select: function( event, ui ) {
                const item = ui.item
                addIssue( selectedIds, item.id, item.value );
                addIssueToHidden( item.id );
                console.log(event.target)
            }
        })

        // BINDING EVENTS
        body.on( 'change', "#" + assetsData.dateStartId, changeStartDate )
        body.on( 'change', "#" + assetsData.dateEndId, changeEndDate )
        body.on( 'click', "#" + assetsData.issuesSelectdId + ' p button', removeIssue )
    })
})(jQuery)

