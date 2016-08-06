function copyMessage(el, msgEl) {
    var succeed = copy(el);
    if(!succeed) {
        prompt('Press Ctrl/Cmd+C to copy our IP to your clipboard', el.innerHTML);
    } else {
        $(msgEl).tooltip({
            placement: 'bottom',
            title: 'Copied!',
            trigger: 'manual'
        }).tooltip('show');

        window.setTimeout(function() {
            $(msgEl).tooltip('destroy');
        }, 1000);
    }
}

function copy(elem) {
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if(isInput) {
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        target = document.getElementById(targetId);
        if(!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    var succeed;
    try {
        succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }

    if(currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if(isInput) {
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        target.textContent = "";
    }
    return succeed;
}

var buttons = document.querySelectorAll('.btn-copy-ip');
Array.prototype.forEach.call(buttons, function(btn) {
    btn.addEventListener('click', function(e) {
        copyMessage(document.getElementById("ip-address"), btn);
    });
});