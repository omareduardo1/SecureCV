from PIL import Image

def estrai_messaggio(image_path):
    immagine = Image.open(image_path).convert("RGBA")
    larghezza, altezza = immagine.size
    bits = ""

    for y in range(altezza):
        for x in range(larghezza):
            r, g, b, a = immagine.getpixel((x, y))
            bits += str(r & 1)

    # Ricompone il messaggio nascosto
    msg = ""
    msg = ""
    for i in range(0, len(bits), 8):
        byte = bits[i:i+8]
        if len(byte) < 8:
            break
        char = chr(int(byte, 2))
        msg += char
        if msg.endswith("###"):
            break

    print("Messaggio nascosto: ", msg.rstrip("###"))

# Esempio su una immagine caricata nel sito
estrai_messaggio("Images/CV.png")