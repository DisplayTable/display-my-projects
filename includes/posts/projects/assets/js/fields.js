(function($) {
    $(() => {
        const body = $( 'body' );
        const selectedNode = document.getElementById(assetsData.issuesSelectdId);
        const selectedHiddenNode = document.getElementById(assetsData.issuesSelectdHiddenId);
        const dateStart = $( "#" + assetsData.dateStartId );
        const dateEnd = $( "#" + assetsData.dateEndId );
        let selectedIds = selectedHiddenNode && selectedHiddenNode.value 
            ? selectedHiddenNode.value.split( ',' ).map( val => parseInt( val ) ) 
            : [];

        /**
         * Helper to add issue.
         *
         * @param {Node} selectedNode - 
         * @param {String} value - El valor seleccionado.
         */
         const addIssue = ( id, value, url ) => {
            const container = document.createElement('div');
            const link = document.createElement('a');
            const remove = document.createElement('span');
            container.className = assetsData.issueContainer;
            remove.className = assetsData.issueRemove;
            remove.textContent = '+';
            link.textContent = value;
            link.dataset.id = id;
            link.href = url;
            link.target = '_blank';
            link.className = 'delete-issue';
            container.appendChild(link);
            container.appendChild(remove);
            selectedNode.appendChild(container);
        }

        /**
         * Helper to add issue to hidden field.
         */
        const addIssueToHidden = _ => selectedHiddenNode.value = selectedIds.join(',');

        /**
         * Handler for remove issue.
         * 
         * @param {jQuery.Event} event 
         */
        const removeIssue = event => {
            const target = $(event.target);
            const elToRemove = target.prev();
            const id = elToRemove[0].dataset.id;            
            selectedIds = selectedIds.filter( f => f !== parseInt( id ) );
            selectedHiddenNode.value = selectedIds.join(',');
            $( elToRemove ).closest( 'div' ).remove();
        }

        /**
         * Jquery UI Autocomplete.
         */
        $( "#" + assetsData.issuesId ).autocomplete({
            minLength: 2,
            source: ( request, response ) => {
                const body = { action: assetsData.action, term: request.term, nonce: assetsData.nonce }
                $.get( assetsData.url, body, data => { response( JSON.parse( data ) ) } );
            },
            select: ( event, ui ) => {
                const target = $( event.target );
                const item = ui.item;
                const isRepeteadId = selectedIds.some( id => id === item.id );
                if( !isRepeteadId ) {
                    selectedIds = [ ...selectedIds, item.id ];
                    addIssue( item.id, item.value, item.url );
                    addIssueToHidden();
                    setTimeout( _ => target.val( '' ), 0 );
                }
            }
        })

        /**
         * Jqurey UI Datepicker
         */
        dateStart.datepicker();
        dateEnd.datepicker();

        dateStart.datepicker( "option", "onSelect", ( dateText, inst ) => { 
            dateEnd.datepicker( "option", "minDate", dateText )
         } );
        dateEnd.datepicker( "option", "onSelect", ( dateText , inst ) => { 
            dateStart.datepicker( "option", "maxDate", dateText ) 
        } );

        // BINDING EVENTS
        body.on( 'click', '.' + assetsData.issueRemove, removeIssue )
    })
})(jQuery)

