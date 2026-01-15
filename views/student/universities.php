<?php include 'views/layouts/header.php'; ?>

<center>
    <h2>Registered Universities</h2>
    <div id="university-list">
        <p>Loading...</p>
    </div>

    <div id="university-details" style="display:none; border: 1px solid black; padding: 20px; margin-top: 20px;">
        <h3 id="detail-name"></h3>
        <p><strong>Location:</strong> <span id="detail-location"></span></p>
        <p><strong>Description:</strong> <span id="detail-description"></span></p>
        <button onclick="document.getElementById('university-details').style.display='none'">Close</button>
    </div>
    
    <br>
    <p><a href="index.php?url=dashboard">Back to Dashboard</a></p>
</center>

<script>
function loadUniversities() {
    fetch('index.php?url=api_universities')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        var list = document.getElementById('university-list');
        var html = '';
        
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var uni = data[i];
                html += '<div style="border:1px solid gray; margin:10px; padding:10px;">';
                html += '<h3>' + uni.name + '</h3>';
                html += '<p>Location: ' + uni.location + '</p>';
                html += '<button onclick="viewDetails(' + uni.id + ')">View Details</button>';
                html += '</div>';
            }
        } else {
            html = '<p>No universities found.</p>';
        }
        
        list.innerHTML = html;
    });
}

function viewDetails(id) {
    fetch('index.php?url=api_university_details&id=' + id)
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        document.getElementById('detail-name').innerText = data.name;
        document.getElementById('detail-location').innerText = data.location;
        document.getElementById('detail-description').innerText = data.description;
        document.getElementById('university-details').style.display = 'block';
    });
}

loadUniversities();
</script>

<?php include 'views/layouts/footer.php'; ?>
