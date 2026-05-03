from fastapi import FastAPI, File, UploadFile
from fastapi.middleware.cors import CORSMiddleware
import openai
import base64
import uvicorn
from io import BytesIO
from PIL import Image
import os

app = FastAPI()
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["*"],
    allow_headers=["*"],
)

# ВСТАВЬТЕ ВАШ КЛЮЧ:
openai.api_key = ""

@app.post("/analyze")
async def analyze(file: UploadFile = File(...)):
    # Читаем фото
    image_data = await file.read()
    
    # Конвертируем в base64
    base64_image = base64.b64encode(image_data).decode()
    
    # Запрос к GPT-4o
    response = openai.chat.completions.create(
        model="gpt-4o",
        messages=[
            {
                "role": "system",
                "content": "Ты помогаешь создавать карточки товаров для маркетплейсов Wildberries и Ozon. Определи товар на фото и напиши 5-7 ключевых преимуществ. Верни ТОЛЬКО JSON без лишнего текста в формате: {\"name\": \"Название товара\", \"advantages\": [\"преимущество 1\", \"преимущество 2\"]}"
            },
            {
                "role": "user",
                "content": [
                    {
                        "type": "image_url",
                        "image_url": {
                            "url": f"data:image/jpeg;base64,{base64_image}"
                        }
                    }
                ]
            }
        ],
        max_tokens=500
    )
    
    return response.choices[0].message.content

if __name__ == "__main__":
    uvicorn.run(app, host="0.0.0.0", port=8000)
