let quillOptions = {
    modules: {
        toolbar: '#toolbar-container'
    },
    theme: 'snow'
}
var quill = new Quill('#editor', quillOptions);

quill.on('selection-change', function(range, oldRange, source) {
    if (range) {
      if (range.length == 0) {
        console.log('User cursor is on', range.index);
      } else {
        var text = quill.getText(range.index, range.length);
        console.log('User has highlighted', text);
      }
    } else {
      console.log('Cursor not in the editor');
    }
});

quill.on('editor-change', function(eventName, ...args) {
    if (eventName === 'text-change') {
      // args[0] will be delta
    } else if (eventName === 'selection-change') {
      // args[0] will be old range
    }
});