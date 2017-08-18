import cv2
import numpy as np
import os

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye.xml')
while 1:  
    for file in os.listdir("C:\\xampp\\htdocs\\fasttry\\useruploads\\img\\"):
        print("\\img\\"+file)
        img = cv2.imread("C:\\xampp\\htdocs\\fasttry\\useruploads\\img\\"+file)
        s_img = cv2.imread("C:/xampp/htdocs/fasttry/useruploads/dress.png")
        if img is not None and s_img is not None:
            #gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
            faces = face_cascade.detectMultiScale(img, 1.3, 5)
            if len(faces)!=0:
                for (x,y,w,h) in faces:
                    l_img = img
                    x_onset = 4*w/s_img.shape[0]
                    y_onset = 3*h/s_img.shape[1]
                    x_offset = int(x - x_onset*335)
                    y_offset = y + h 
                    if x_offset<=0:
                        xcut=abs(x_offset)
                        x_offset=0
                    else:
                        xcut=0
                    s_img = cv2.resize(s_img,(0,0),fx=x_onset,fy=y_onset)
                    crop=s_img[0:l_img.shape[0]-y_offset,xcut:l_img.shape[1]-x_offset]
                    #l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1]] = crop
                    #for c in range(0,3):
                    #    l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1], c] = crop[:,:,c] * (crop[:,:,2]/255.0) +  l_img[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1], c] * (1.0 - crop[:,:,2]/255.0)

                    img1=l_img
                    img2=crop

                    # I want to put logo on top-left corner, So I create a ROI
                    rows,cols,channels = img2.shape
                    roi = img1[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1] ]

                    # Now create a mask of logo and create its inverse mask also
                    img2gray = cv2.cvtColor(img2,cv2.COLOR_BGR2GRAY)
                    ret, mask = cv2.threshold(img2gray, 10, 255, cv2.THRESH_BINARY)
                    mask_inv = cv2.bitwise_not(mask)
                     
                    # Now black-out the area of logo in ROI
                    img1_bg = cv2.bitwise_and(roi,roi,mask = mask_inv)
                     
                    # Take only region of logo from logo image.
                    img2_fg = cv2.bitwise_and(img2,img2,mask = mask)
                     
                    # Put logo in ROI and modify the main image
                    dst = cv2.add(img1_bg,img2_fg)
                    img1[y_offset:y_offset+crop.shape[0], x_offset:x_offset+crop.shape[1] ] = dst

                cv2.imwrite("C:/xampp/htdocs/fasttry/useruploads/conv/"+file,img1)
            else:
                continue
        else:
            cv2.imwrite("C:/xampp/htdocs/fasttry/useruploads/conv/"+file,img)