__author__ = 'Jarrod'

import sys, pygame

pygame.init()

size = width, height = 1300, 1000
speed = [2, 2]
black = 0, 0, 0
screen = pygame.display.set_mode((468, 60))
background = pygame.Surface(screen.get_size())
background = background.convert()
background.fill((250, 250, 250))



if pygame.font:
        font = pygame.font.Font(None, 36)
        text = font.render("Pummel The Chimp, And Win $$$", 1, (10, 10, 10))
        textpos = text.get_rect(centerx=background.get_width()/2)
        background.blit(text, textpos)
#screen = pygame.display.set_mode(size)

#ball = pygame.image.load("ball.png")

'''
while 1:
    for event in pygame.event.get():
        if event.type == pygame.QUIT: sys.exit()

        ballrect = ballrect.move(speed)
        if ballrect.left < 0 or ballrect.right > width:
            speed[0] = -speed[0]
        if ballrect.top < 0 or ballrect.bottom > height:
            speed[1] = -speed[1]

        screen.fill(black)
        screen.blit(ball, ballrect)
        pygame.display.flip()


'''
