import Editor from '@toast-ui/editor'
import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';
//bootstrap
require("bootstrap");

//turbolinks
let Turbolinks = require("turbolinks")
Turbolinks.start()

//Toast Markdown Editor
const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '400px',
  initialEditType: 'markdown',
  placeholder: 'Write something cool!',
})