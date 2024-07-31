# main.py
from fastapi import FastAPI
from db import get_db_connection

app = FastAPI()

@app.get("/")
def read_root():
    return {"Hello": "World"}

@app.get("/users/{user_id}")
def read_user(user_id: int):
    conn = get_db_connection()
    cursor = conn.cursor()
    
    query = sql.SQL("SELECT * FROM usuarios WHERE id = %s")
    cursor.execute(query, (user_id,))
    
    user = cursor.fetchone()
    cursor.close()
    conn.close()
    
    if user:
        return {"user": user}
    else:
        return {"error": "User not found"}
