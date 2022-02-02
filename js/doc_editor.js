let quillOptions = {
    modules: {
        toolbar: '#toolbar-container'
    },
    theme: 'snow'
}
var quill = new Quill('#editor', quillOptions);

quill.on('editor-change', function (eventName, ...args) {
    console.log(args);
    let delta = args[0];
    let oldDelta = args[1];
    let source = args[2];

    if (eventName === 'text-change') {
        if (source == 'api') {            
            console.log("An API call change.");
        } else if (source == 'user') {
            let changeIndex = delta.ops[0].retain;
            let changes = delta.ops.slice(1);
            changes.forEach(element => {
                let changeType = Object.keys(element)[0];
                let change = Object.values(element)[0];
                let attributes = element.attributes;
                console.log("A user " + changeType + " '" + change + "' at index: " + changeIndex  + " with attributes " + JSON.stringify(attributes));
            });
        }
    } else if (eventName === 'selection-change') {
        let range = delta;
        if (range && source == 'user') {
            if (range.length == 0) {
                console.log('User cursor is on', range.index);
            } else {
                var text = quill.getText(range.index, range.length);
                console.log('User has highlighted', text);
            }
        } else {
            console.log('Cursor not in the editor');
        }
    }
});