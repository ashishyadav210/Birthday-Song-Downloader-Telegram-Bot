# 🎂 Birthday Song Bot 🤖🎶

🎉 **Personalized Birthday Songs on Telegram**  
Fast • Fun • Automated • Powerful

---

<p align="center">
  <img src="https://img.shields.io/badge/Telegram-Bot-blue?logo=telegram">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-purple?logo=php">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/🎵%20Birthday%20Songs-Available-orange">
  <img src="https://img.shields.io/badge/🔐%20Force%20Join-Enabled-red">
  <img src="https://img.shields.io/badge/📢%20Broadcast-Admin%20Only-blueviolet">
</p>

---

⚡ **Send Name → 🎶 Get Birthday Song → 🎉 Celebrate**

---

## ✨ ABOUT THE BOT

**Birthday Song Bot** is a Telegram bot that generates **personalized birthday song audios** using the user’s name.  
It also includes a **force join system** and **admin broadcast feature** to grow your audience.

✔️ Instant MP3 generation  
✔️ Secure & verified users  
✔️ Fully automated system  

---

## 🚀 FEATURES

✅ Personalized birthday song by name  
✅ Automatic MP3 availability check  
✅ Telegram (force join) + YouTube + Instagram join button

✅ Inline verification button  
✅ Admin-only broadcast system  
✅ User auto-save system  

---

## 🔄 HOW IT WORKS

🎯 `/start` command  
⬇️  
✍️ User sends **Name**  
⬇️  
🔐 User joins all required social links  
⬇️  
✅ Verification successful  
⬇️  
🎶 Birthday song audio sent  

❌ If song not available → Error message shown

---

## 🎵 SONG GENERATION LOGIC

🎧 Song source format:

✔️ File exists → Audio delivered  
❌ File missing → Friendly error message  

---

## 📢 BROADCAST SYSTEM (ADMIN)

🔑 **Admin Only Command:**

/broadcast

📌 Flow:
1. Admin sends /broadcast  
2. Bot waits for message  
3. Message delivered to all users  

---

## 🔐 JOIN SYSTEM

User must join:

🔹 Telegram Channel (force join)
🔹 YouTube Channel  
🔹 Instagram Profile  

🚫 Without joining → Bot access denied

---

## 📂 PROJECT STRUCTURE

BirthdaySongBot  
├── bot.php        → Main bot logic  
├── config.php     → Bot configuration  
└── users.txt      → Saved user IDs    

---

## ⚙️ CONFIGURATION

Edit `config.php`:

BOT_TOKEN = YOUR_BOT_TOKEN  
ADMIN_ID = YOUR_TELEGRAM_ID  

CHANNEL_ID = -100XXXXXXXXXX  
CHANNEL_LINK = https://t.me/YourChannel  

YT = https://youtube.com/@YourChannel  
IG = https://instagram.com/YourProfile  

---

## 🛠 REQUIREMENTS

🟢 PHP 7.4 or higher  
🟢 HTTPS enabled hosting  
🟢 Telegram Bot Token  
🟢 Webhook access  

---

## 🚀 DEPLOYMENT

1️⃣ Upload files to your server  
2️⃣ Set webhook:

https://api.telegram.org/bot<BOT_TOKEN>/setWebhook?url=https://yourdomain.com/Bot.php  

3️⃣ Bot is live 🎉

---

## 🔒 SECURITY TIPS

🔐 Keep config.php private  
🚫 Do not expose bot token  
📁 Use proper file permissions  

---

## 🔥 FUTURE UPGRADES

✨ Multi-language support  
✨ Admin dashboard  
✨ Custom voice songs  
✨ Database integration  

---

## ❤️ CREDITS

Made with ❤️ using **PHP & Telegram Bot API**
