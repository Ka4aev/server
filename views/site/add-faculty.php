<div class="add-discipline-page">
    <div class="add-discipline-container">
        <h1>Добавить кафедру</h1>

        <form class="discipline-form">
            <div class="form-group">
                <label>Наименование</label>
                <input type="text" placeholder="введите название кафедры">
            </div>

            <button type="submit" class="add-button">добавить</button>
        </form>
    </div>
</div>

<style>
    .add-discipline-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        background-color: #f5f5f5;
        padding: 20px;
    }

    .add-discipline-container {
        width: 100%;
        max-width: 500px;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .add-discipline-container h1 {
        margin: 0 0 30px 0;
        font-size: 24px;
        font-weight: 500;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #555;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-group input::placeholder {
        color: #aaa;
    }

    .add-button {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .add-button:hover {
        background-color: #45a049;
    }
</style>