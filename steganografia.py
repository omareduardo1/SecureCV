from PIL import Image

def messaggio_nascosto(image_path, output_path, message):
    immagine = Image.open(image_path).convert("RGBA")  # converte in RGBA per uniformità
    encoded = immagine.copy()
    larghezza, altezza = immagine.size
    msg = message + '###'
    msg_bin = ''.join(format(ord(c), '08b') for c in msg)

    data_index = 0
    for y in range(altezza):
        for x in range(larghezza):
            if data_index < len(msg_bin):
                pixel = list(immagine.getpixel((x, y)))  # [R, G, B, (A)]
                pixel[0] = (pixel[0] & ~1) | int(msg_bin[data_index])  # modifica solo il rosso
                data_index += 1
                encoded.putpixel((x, y), tuple(pixel))
            else:
                break
        if data_index >= len(msg_bin):
            break

    encoded.convert("RGB").save(output_path)
    print(f"✅ Messaggio nascosto in {output_path}")

# CHIAMATA
msg = "Omar Eduardo Borges Montero, matricola 157185, 2025"
immagini = ["CV.png", "innMontagna.png", "Droni.png", "CV_Europass.png", "FutureofFashion-Certificate.png", "DigitalTraining.png"]

for nome_img in immagini:
    messaggio_nascosto(f"Images/{nome_img}", f"Images/{nome_img}", msg)