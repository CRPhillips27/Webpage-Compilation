document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("lookup").addEventListener("click", function () {
        clearDefinitions();
        showLoading();

        var term = document.getElementById("term").value;
        var apiUrl = "http://localhost/assignment%207/urban.php?term=" + term + "&all";

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then(xmlText => {
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(xmlText, "text/xml");
                var entries = xmlDoc.querySelectorAll("entry");

                if (entries.length === 0) {
                    throw new Error("No entries found in XML data");
                }

                var resultList = document.createElement("ol");

                entries.forEach(entry => {
                    var listItem = document.createElement("li");
                    var definition = entry.querySelector("definition").textContent;
                    var example = entry.querySelector("example").textContent;
                    var author = entry.getAttribute("author") || "Author not available";

                    listItem.innerHTML = `
                        <p>Definition: ${definition}</p>
                        <p>Example: ${example}</p>
                        <p>Author: ${author}</p>
                    `;

                    resultList.appendChild(listItem);
                });

                clearDefinitions(); // Clear the loading animation
                document.getElementById("result").appendChild(resultList);
            })
            .catch(error => {
                console.error("Error fetching definitions:", error);
                clearDefinitions(); // Clear the loading animation
                showError("Word not found in the dictionary.");
            });
    });
});

function clearDefinitions() {
    document.getElementById("result").innerHTML = ""; // Clear existing content
}

function showLoading() {
    document.getElementById("result").innerHTML = '<img src="loading.gif" alt="Loading..." />';
}

function showError(message) {
    document.getElementById("result").innerHTML = `<p>${message}</p>`;
}
