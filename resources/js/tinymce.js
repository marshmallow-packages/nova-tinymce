import tinymce from "tinymce/tinymce";
window.tinymce = tinymce;

/* Default icons are required. After that, import custom icons if applicable */
import "tinymce/icons/default";

/* Required TinyMCE components */
import "tinymce/themes/silver";
import "tinymce/models/dom";

// Disabled plugins you want to use has to be imported

// import "tinymce/plugins/bbcode";
// import "tinymce/plugins/colorpicker";
// import "tinymce/plugins/contextmenu";
// import "tinymce/plugins/emoticons/js/emojis";
// import "tinymce/plugins/fullpage";
// import "tinymce/plugins/hr";
// import "tinymce/plugins/imagetools";
// import "tinymce/plugins/legacyoutput";
// import "tinymce/plugins/noneditable";
// import "tinymce/plugins/paste";
// import "tinymce/plugins/print";
// import "tinymce/plugins/template";
// import "tinymce/plugins/spellchecker";
// import "tinymce/plugins/tabfocus";
// import "tinymce/plugins/textcolor";
// import "tinymce/plugins/textpattern";
// import "tinymce/plugins/toc";

// Any plugins you want to use has to be imported
import "tinymce/plugins/advlist";
import "tinymce/plugins/anchor";
import "tinymce/plugins/autolink";
import "tinymce/plugins/autoresize";
import "tinymce/plugins/autosave";
import "tinymce/plugins/charmap";
import "tinymce/plugins/code";
import "tinymce/plugins/codesample";
import "tinymce/plugins/directionality";
import "tinymce/plugins/emoticons";
import "tinymce/plugins/emoticons/js/emojis";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/help";
import "tinymce/plugins/image";
import "tinymce/plugins/importcss";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/link";
import "tinymce/plugins/lists";
import "tinymce/plugins/media";
import "tinymce/plugins/nonbreaking";
import "tinymce/plugins/pagebreak";
import "tinymce/plugins/preview";
import "tinymce/plugins/quickbars";
import "tinymce/plugins/save";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/table";

import "tinymce/plugins/visualblocks";
import "tinymce/plugins/visualchars";
import "tinymce/plugins/wordcount";

// Any external plugins you want to use has to be imported
import "@/plugins/variable/plugin";
import "@/plugins/button/plugin";
import "@openregion/tinymce-word-paste-plugin";
