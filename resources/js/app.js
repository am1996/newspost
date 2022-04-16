import Editor from '@toast-ui/editor'
import '../css/codemirror.min.css';
import '@toast-ui/editor/dist/toastui-editor.css';
//bootstrap
require("bootstrap");

//Toast Markdown Editor
const chart = require('@toast-ui/editor-plugin-chart');
const uml = require('@toast-ui/editor-plugin-uml');
const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '400px',
  initialEditType: 'markdown',
  plugins:[
    chart,uml
  ]
});