    <h1>🎵 Song Library - Laravel Project</h1>

    <p>
        A simple yet functional <strong>Song Library web application</strong> built with Laravel.
        This project focuses on organizing songs by category, managing a full library with CRUD operations,
        and providing a smooth user experience with filtering, searching, and sorting features.
    </p>

    <hr>

    <h2>📌 Features</h2>

    <h3>🏠 Dashboard</h3>
    <ul>
        <li>Displays songs <strong>grouped by category (genre)</strong></li>
        <li>Provides a quick overview of your music collection</li>
    </ul>

    <h3>🎧 Library</h3>
    <ul>
        <li>Displays <strong>all songs</strong></li>
        <li>Full CRUD functionality:
            <ul>
                <li>➕ Create new songs</li>
                <li>👁️ View song details</li>
                <li>✏️ Update existing songs</li>
                <li>❌ Delete songs <em>(logical delete using <code>is_active</code>)</em></li>
            </ul>
        </li>
        <li>View page includes:
            <ul>
                <li>🔗 Link to <strong>songs by the same artist</strong></li>
            </ul>
        </li>
    </ul>

    <h3>⭐ Favorites</h3>
    <ul>
        <li>Displays songs marked as <strong>favorite</strong></li>
        <li>Songs are grouped by <strong>category (genre)</strong></li>
        <li>Filtered via <strong>route-based genre</strong></li>
        <li>Includes:
            <ul>
                <li>🔍 Search functionality</li>
                <li>🔃 Sorting options:
                    <ul>
                        <li>Title</li>
                        <li>Artist</li>
                        <li>Published Date</li>
                        <li>Recently Added</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>

    <hr>

    <h2>🧩 Components Used</h2>
    <ul>
        <li><code>x-layout</code> – Main layout wrapper</li>
        <li><code>x-slot</code> – Dynamic content injection</li>
        <li><code>x-nav-link</code> – Navigation links</li>
        <li><code>x-genre</code> – Genre display and filtering UI</li>
    </ul>

    <hr>

    <h2>🗄️ Database</h2>
    <p><strong>Database:</strong> MySQL</p>

    <h3>📄 Song Table Structure</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Field</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>song_id</td><td>Primary key</td></tr>
            <tr><td>title</td><td>Song title</td></tr>
            <tr><td>artist</td><td>Artist name</td></tr>
            <tr><td>genre</td><td>Song genre/category</td></tr>
            <tr><td>published_date</td><td>Release date</td></tr>
            <tr><td>is_active</td><td>Logical deletion flag</td></tr>
            <tr><td>is_favorite</td><td>Favorite status</td></tr>
            <tr><td>created_at</td><td>Record creation time</td></tr>
            <tr><td>updated_at</td><td>Last update time</td></tr>
        </tbody>
    </table>

    <hr>

    <h2>🎨 UI & Navigation</h2>
    <ul>
        <li>Clean and intuitive <strong>user interface</strong></li>
        <li>Smooth navigation between:
            <ul>
                <li>Dashboard</li>
                <li>Library</li>
                <li>Favorites</li>
            </ul>
        </li>
        <li>Responsive design for better usability</li>
    </ul>

    <hr>

    <h2>⚙️ Tech Stack</h2>
    <ul>
        <li><strong>Backend:</strong> Laravel</li>
        <li><strong>Frontend:</strong> Blade + Tailwind CSS</li>
        <li><strong>Database:</strong> MySQL</li>
    </ul>

    <hr>

    <h2>🚀 Getting Started</h2>

    <ol>
        <li>Clone the repository:
            <pre><code>git clone &lt;your-repo-url&gt;</code></pre>
        </li>
        <li>Install dependencies:
            <pre><code>composer install

npm install && npm run dev</code></pre>

</li>
<li>Setup environment:
<pre><code>cp .env.example .env
php artisan key:generate</code></pre>
</li>
<li>Configure your database in <code>.env</code></li>
<li>Run migrations:
<pre><code>php artisan migrate</code></pre>
</li>
<li>Start the server:
<pre><code>php artisan serve</code></pre>
</li>
</ol>

    <hr>

    <h2>📈 Future Improvements</h2>
    <ul>
        <li>Add authentication (user-based libraries)</li>
        <li>Upload and manage song images/audio files</li>
        <li>API support for mobile integration</li>
        <li>Playlist feature</li>
    </ul>

    <hr>

    <h2>👨‍💻 Author</h2>
    <p>Developed as a learning project to practice Laravel CRUD, routing, and UI structuring.</p>
