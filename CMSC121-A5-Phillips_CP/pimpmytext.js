$(document).ready(function () {
    $("#pimpButton").mousedown(function () {
        var timer = setInterval(function () {
            var currentFontSize = parseInt($("#textInput").css("font-size"));
            var newFontSize = currentFontSize + 2 + "pt";
            $("#textInput").css("font-size", newFontSize);
        }, 500);
    });
   $("#pimpButton").click(function () {
        clearInterval(timer);
    });
    $("#snoopifyButton").click(function () {
        var text = $("#textInput").val();
        text = text.toUpperCase() + "!";

        var sentences = text.split(".");
        for (var i = 0; i < sentences.length; i++) {
            var sentence = sentences[i].trim();
            if (sentence !== "") {
                var words = sentence.split(" ");
                if (words.length > 1) {
                    words[words.length - 1] += "-izzle";
                }
                sentences[i] = words.join(" ");
            }
        }
        text = sentences.join(". ");

        $("#textInput").val(text);
    });
$("#malkovitchButton").click(function () {
        var text = $("#textInput").val();
        var words = text.split(/\s+/);
        for (var i = 0; i < words.length; i++) {
            var word = words[i];
            if (word.length >= 5) {
                if (word.includes("-")) {
                    var parts = word.split("-");
                    for (var j = 0; j < parts.length; j++) {
                        if (parts[j].length >= 5) {
                            parts[j] = "Malkovich";
                        }
                    }
                    words[i] = parts.join("-");
                } else {
                    words[i] = "Malkovich";
                }
            }
        }
        text = words.join(" ");
        $("#textInput").val(text);
    });
    $("#blingCheckbox").change(function () {
        if (this.checked) {
            $("#textInput").addClass("bling-text");
            $("body").css("background-image", "url('hundred-dollar-bill.jpg')");
        } else {
            $("#textInput").removeClass("bling-text");
            $("body").css("background-image", "none");
        }
    });
});
