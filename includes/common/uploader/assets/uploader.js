(function($) {
    
    let mediaUploader;
    const openButton = $( '#' + dmpCommonUploaderAssetsData.openDialogId );
    const filesContainer = $( '#' + dmpCommonUploaderAssetsData.filesID );
    const filesHidden = $( '#' );
    let files = filesHidden[0] && filesHidden[0].value 
        ? filesHidden[0].value.split( ',' ).map( val => parseInt( val ) ) 
        : [];

    const addFile = file => {
        if( file.type === 'image' ) {
            // Add an image filler
        }
        else {
            // Add a file filler
        }
        files.push(file.id);
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
                    addFile(file);
                } );
                filesHidden[0].value = files.join(',');
            } )
            mediaUploader.open();
        }
        openButton.on( 'click', openMediaDialog );
    });

})(jQuery);