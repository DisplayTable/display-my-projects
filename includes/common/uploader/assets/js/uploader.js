(function($) {
    
    let mediaUploader;
    const openButton = $( '#' + dmpCommonUploaderAssetsData.openDialogId );
    const filesContainer = $( '#' + dmpCommonUploaderAssetsData.filesID );
    const filesHidden = $( '#' + dmpCommonUploaderAssetsData.filesHiddenID );
    let files = filesHidden[0] && filesHidden[0].value 
        ? filesHidden[0].value.split( ',' ).map( val => parseInt( val ) ) 
        : [];

    /**
     * Helper funtion to add a file.
     * 
     * @param {Object} file File
     */
    const addFile = file => {
        const fileNode = $( '<div>', { class: dmpCommonUploaderAssetsData.fileItem, 'data-id': file.id } );
        const buttonNode = $( '<button>', { type: 'button', class: 'delete-file' } );
        buttonNode.append( '<span>+</span>' );
        fileNode.append( buttonNode );
        if( file.type === 'image' ) {
            fileNode.append( `<a class="image" href="${file.url}" data-lightbox="${file.id}" data-title="${file.caption}"><img src="${file.url}" /></a>` )
        }
        else {
            fileNode.append( `<a class="file" href="${file.url}" target="_blank"><span class="dashicons dashicons-admin-page"></span></a>` )
        }
        files.push(file.id);
        filesContainer.append( fileNode )
    }

    /**
     * Handler for remove issue.
     * 
     * @param {jQuery.Event} event 
     */
    const removeFile = event => {
        const target = $(event.target);
        const elToRemove = target.is( 'button' ) ? target.parent() : target.parent().parent() ;
        const id = elToRemove[0].dataset.id;
        files = files.filter( f => f !== parseInt( id ) );
        filesHidden[0].value = files.join(',');
        $( elToRemove ).closest( 'div' ).remove();
    }

    $(() => {
        const openMediaDialog = event => {
            if( mediaUploader ) {
                mediaUploader.open();
                return;
            }    
            mediaUploader = wp.media.frames.file_frame = wp.media({ multiple: true });
            mediaUploader.on( 'select', () => {
                const attachments = mediaUploader.state().get( 'selection' )
                attachments.forEach( attachment => {
                    const file = attachment.toJSON();
                    const isRepeteadId = files.some( id => id === file.id );
                    if( !isRepeteadId ) {
                        addFile(file);
                    }
                } );
                filesHidden[0].value = files.join(',');
            } )
            mediaUploader.open();
        }
        openButton.on( 'click', openMediaDialog );
    });

    $( 'body' ).on( 'click', '.delete-file', removeFile );

})(jQuery);