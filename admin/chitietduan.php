<!DOCTYPE html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta name="google-site-verification" content="d_76nSOuhpTdqn_6IJVDfLO76UO0p3XaM8h69XzymeM" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-38752833-5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-38752833-5');
    </script>
    <meta charset="utf-8">
    <title>Project Gantt</title>
    <meta property="og:url" content="https://ricwtk.github.io/project-gantt">
    <meta property="og:title" content="Project Gantt">
    <meta property="og:description" content="Gantt chart editor">
    <meta name="description" content="Gantt chart editor">
    <meta name="keywords" content="Project Gantt, Gantt chart, editor">
    <link rel="icon" type="image/png" href="icons/icon.png?v=1.0">
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <style>
      [v-cloak] { display:none; }
      .file-dialog { height: 90%; }
    </style>
  </head>

  <body>
    <div id="app" v-cloak>
      <v-app>
        <v-navigation-drawer
          v-model="drawer"
          app
          clipped
          mobile-break-point="1000"
        >
          <v-list subheader>
            <v-list-group>
              <template v-slot:activator>
                <template v-if="isSignedIn">
                  <v-list-item-avatar left>
                    <v-img v-if="user.imageUrl" :src="user.imageUrl"></v-img>
                    <v-icon v-else>mdi-account</v-icon>
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title v-html="user.name" :title="user.name"></v-list-item-title>
                    <v-list-item-subtitle v-html="user.email" :title="user.email"></v-list-item-subtitle>
                  </v-list-item-content>
                </template>
                <template v-else>
                  <v-list-item-avatar left><v-icon>mdi-account</v-icon></v-list-item-avatar>
                  <v-list-item-content><v-list-item-title>Connect to <v-icon>mdi-google-drive</v-icon></v-list-item-title></v-list-item-content>
                </template>
              </template>

              <v-list-item link @click="signInClick" title="log in" v-if="!isSignedIn">
                <v-list-item-content><v-list-item-title>Log in</v-list-item-title></v-list-item-content>
                <v-list-item-action><v-icon>mdi-login</v-icon></v-list-item-action>
              </v-list-item>
              <v-list-item link @click="signOutClick" title="log out" v-if="isSignedIn">
                <v-list-item-content><v-list-item-title>Log out</v-list-item-title></v-list-item-content>
                <v-list-item-action><v-icon>mdi-logout</v-icon></v-list-item-action>
              </v-list-item>
              <v-list-item link @click="disconnectClick" title="revoke all permissions" v-if="isSignedIn">
                <v-list-item-content><v-list-item-title>Disconnect app</v-list-item-title></v-list-item-content>
                <v-list-item-action><v-icon>mdi-exit-run</v-icon></v-list-item-action>
              </v-list-item>
            </v-list-group>
        
            <v-divider></v-divider>

            <v-list-item link @click="openPrivacyPolicy">
              <v-list-item-action><v-icon>mdi-security</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>Privacy policy</v-list-item-title></v-list-item-content>
            </v-list-item>
            <v-list-item link @click="helpDialog = true">
              <v-list-item-action><v-icon>mdi-help-circle</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>Help</v-list-item-title></v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>

            <v-list-item link @click="newInOld">
              <v-list-item-action><v-icon>mdi-file-plus</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>New</v-list-item-title></v-list-item-content>
              <v-list-item-action @click.stop="newInNew"><v-icon>mdi-open-in-new</v-icon></v-list-item-action>
            </v-list-item>
            <v-list-item link :disabled="!isSignedIn" @click="openFileDialog = true">
              <v-list-item-action><v-icon>mdi-folder-open</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>Open</v-list-item-title></v-list-item-content>
            </v-list-item>
            <v-list-item link :disabled="!isSignedIn || !currentFile.isAppAuthorized || !currentFile.id" @click="justSave" :title="isSignedIn ? (currentFile.isAppAuthorized ? '' : 'Changes to this file cannot be saved') : 'Sign in to save file to Google Drive'">
              <v-list-item-action><v-icon>mdi-content-save</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>Save</v-list-item-title></v-list-item-content>
            </v-list-item>
            <v-list-item link :disabled="!isSignedIn" @click="saveAsDialog = true" :title="isSignedIn ? '' : 'Sign in to save file to Google Drive'">
              <v-list-item-action><v-icon>mdi-content-save-settings</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>Save as</v-list-item-title></v-list-item-content>
            </v-list-item>
            <!-- <v-list-item link @click="printMode = !printMode">
              <v-list-item-action><v-icon>mdi-printer</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>{{ printMode ? 'Exit' : 'Enter' }} print mode</v-list-item-title></v-list-item-content>
            </v-list-item> -->

            <v-divider></v-divider>
            
            <v-list-item>
              <v-list-item-content>
                <v-list-item-title class="subtitle-2">Gantt charts</v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <!-- <v-list-item link v-for="gc,i in gantts" :key="i" @click="updateHash(i)">
              <v-list-item-action><v-icon>mdi-chart-gantt</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>{{ gc.ganttChartName }}</v-list-item-title></v-list-item-content>
            </v-list-item> -->
            <gantt-chart-list-item v-for="gc,i in gantts" :key="i" 
              @click="updateHash(i)" 
              :item-name="gc.ganttChartName"
              @dragstart="startDragGanttListItem($event,i)"
              @drop="dropGanttListItem($event,i)"
            >
            </gantt-chart-list-item>

            <!-- <v-divider></v-divider>

            <v-list-item>
              <v-list-item-content>
                <v-list-item-title class="subtitle-2">Recent</v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item link>
              <v-list-item-action><v-icon>mdi-file</v-icon></v-list-item-action>
              <v-list-item-content><v-list-item-title>File 1</v-list-item-title></v-list-item-content>
            </v-list-item> -->
            
          </v-list>
        </v-navigation-drawer>

        <v-app-bar app dark dense clipped-left color="primary">
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-avatar tile height="75%" aspect-ratio="1"><v-img src="icons/icon.png" contain></v-img></v-avatar>
          <v-toolbar-title class="pr-1">Project Gantt</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-icon :color="contentChanged ? 'red lighten-4' : 'primary'" :title="contentChanged ? 'click to save' : ''" @click="() => contentChanged ? justSave() : null">mdi-record</v-icon>
        </v-app-bar>
        <v-content>
          <v-container>
            
            <v-row no-gutters class="title" align="end">
              <v-col>{{ currentFile.name ? fileNameForDisplay : "Unsaved file" }}</v-col>
              <v-col cols="auto" class="subtitle-2" v-if="currentFile.name.endsWith('.pgjson')">.pgjson</v-col>
              <v-col cols="auto" v-if="!currentFile.isAppAuthorized">
                <v-btn icon depressed color="red" title="This file cannot be edited. Click for more information." @click="cannotEditDialog = true"><v-icon>mdi-exclamation-thick</v-icon></v-btn>
              </v-col>
            </v-row>
            
            <gantt-chart v-for="gc,i in gantts" ref="gc" :key="i" :id="'gc' + i"
              :is-app-authorized="currentFile.isAppAuthorized"
              v-model="gantts[i]"
              @reorder-task="reorderTask($event,i)"
              @remove="removeGantt(i)"
            ></gantt-chart>

            <v-row no-gutters v-if="currentFile.isAppAuthorized">
              <v-col><v-btn tile block depressed style="background-color: white; border: 1px solid #ddd" title="new Gantt chart" @click="addNewGantt"><v-icon>mdi-plus</v-icon></v-btn></v-col>
            </v-row>

          </v-container>
        </v-content>

        <help-dialog v-model="helpDialog"></help-dialog>
        <file-dialog v-model="saveAsDialog" title="Save as..." @action="saveAs" :start-location="currentFile.parents" action-name="Save"></file-dialog>
        <file-dialog v-model="openFileDialog" title="Open..." @action="openFile" :start-location="currentFile.parents" hide-new-folder action-name="Open" file-entry-read-only highlight-selected-file></file-dialog>

        <v-dialog v-model="cannotEditDialog">
          <v-card>
            <v-card-title>Why I can't edit this file?</v-card-title>
            <v-card-text class="pb-0">
              It's likely that you are here because you opened a file that is 
              <ul>
                <!-- <li>shared by someone else, or</li> -->
                <li>created with text editor</li>
              </ul>
              using a url or the open dialog in this app. 
            </v-card-text>
            <v-card-title>Solution</v-card-title>
            <v-card-text>
              Go to your Google Drive and open this file from Google Drive directly using the <kbd>Open with...</kbd> menu.
            </v-card-text>
          </v-card>
        </v-dialog>

        <v-overlay :value="blockingLoading" z-index="999" class="text-center">
          <v-icon class="display-4">mdi-loading mdi-spin</v-icon>
          <v-row justify="center" align="center">
            <v-col cols="auto" class="display-2 font-weight-black">
              {{ blockingLoadingText }}
            </v-col>
          </v-row>
        </v-overlay>

        <v-snackbar v-model="showNotice" top>
          <v-row no-gutters justify="center">
            <v-col cols="auto">{{ notice }}</v-col>
          </v-row>
        </v-snackbar>

        <v-footer>
          <v-col class="text-center" cols=12>
            Powered by <span style="cursor:pointer" @click="openSite('//vuejs.org/')">Vue</span> and <span style="cursor:pointer" @click="openSite('//vuetifyjs.com/')">Vuetify</span>, created by <span style="cursor:pointer" @click="openSite('//ricwtk.github.io')">R.ich.ard</span>
          </v-col>
        </v-footer>
      </v-app>
    </div>

    <template id="gantt-chart-list-item">
      <v-list-item link @click="$emit('click', $event)" draggable :class="additionalClass">
        <v-list-item-action><v-icon>mdi-chart-gantt</v-icon></v-list-item-action>
        <v-list-item-content><v-list-item-title>{{ itemName }}</v-list-item-title></v-list-item-content>
      </v-list-item>
    </template>

    <template id="gantt-chart">
      <v-container>
        <v-row no-gutters class="pt-3 pb-2" align="end">
          <v-col class="title">{{ settings.ganttChartName }}</v-col>
          <v-col cols="auto" v-if="isAppAuthorized">
            <v-row no-gutters>
              <v-col><v-btn icon title="toggle edit mode" @click="settings.editMode = !settings.editMode"><v-icon>mdi-pencil</v-icon></v-btn></v-col>
              <v-col><v-btn icon title="decrease row height" @click="reduceRowHeight"><v-icon>mdi-arrow-collapse-vertical</v-icon></v-btn></v-col>
              <v-col><v-btn icon title="increase row height" @click="increaseRowHeight"><v-icon>mdi-arrow-expand-vertical</v-icon></v-btn></v-col>
              <v-col><v-btn icon title="decrease column width" @click="reduceColWidth"><v-icon>mdi-arrow-collapse-horizontal</v-icon></v-btn></v-col>
              <v-col><v-btn icon title="increase column width" @click="increaseColWidth"><v-icon>mdi-arrow-expand-horizontal</v-icon></v-btn></v-col>
            </v-row>
          </v-col>
          <v-col cols="auto" v-if="isAppAuthorized"><gantt-settings v-model="settings" @input="emitInput" @remove="$emit('remove')"></gantt-settings></v-col>
        </v-row>

        <v-row no-gutters>
          <v-col cols="3">
            <v-row no-gutters class="flex-nowrap">
              <v-col cols="auto">
                <v-row no-gutters style="border: 1px solid #ddd; background-color: white" :style="{ height: (40 * (settings.dateDisplay.length + 1)) + 'px' }" justify="center" align="center">
                  <v-col cols="auto" class="pa-2 text-no-wrap text-truncate">
                    ID
                  </v-col>
                </v-row>
                <v-row no-gutters>
                  <v-col cols="0" :style="{ height: (settings.rowHeight * taskToDisplay.length) + 'px' }" class="d-flex flex-column">
                    <v-row no-gutters v-for="taskId,n in taskToDisplay" :key="n" style="border: 1px solid #ddd; border-top: 0px; background-color: white" justify="center" align="center">
                      <v-col cols="auto" class="text-no-wrap text-truncate">
                        {{ getTaskId(taskId) }}
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="0">
                <v-row no-gutters style="border: 1px solid #ddd; border-left: 0px; background-color: white" :style="{ height: (40 * (settings.dateDisplay.length + 1)) + 'px' }" justify="center" align="center">
                  <v-col cols="auto" class="text-no-wrap text-truncate">Task</v-col>
                </v-row>
                <v-row no-gutters>
                  <v-col cols="0" :style="{ height: (settings.rowHeight * taskToDisplay.length) + 'px' }" class="d-flex flex-column">
                    <task-title no-gutters v-for="taskId,i in taskToDisplay" :key="i" 
                      style="border: 1px solid #ddd; border-left: 0px; border-top: 0px; background-color: white"
                      :edit-mode="settings.editMode"
                      :value="getTaskFromId(taskId)"
                      @input="setTaskFromId(taskId,$event)"
                      @remove="removeTaskWithId(taskId)"
                      @dragstart="startDragTask($event,taskId)"
                      @drop="dropTask($event,taskId)"
                    >
                    </task-title>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
            <v-row no-gutters>
              <v-btn v-if="settings.editMode" depressed tile block 
                height="40px" 
                style="border: 1px solid #ddd; border-top: 0px; background-color: white"
                @click="addNewTask"
              ><v-icon>mdi-plus</v-icon></v-btn>
            </v-row>
          </v-col>

          <v-col style="overflow: auto;">
            <v-row no-gutters style="height: 40px; border: 1px solid #ddd; border-left: 0px; background-color: white" justify="center" align="center" :style="{ width: (settings.columnWidth * numberOfColumn) + 'px', 'max-width': '100%' }">
              <v-col cols="auto" class="text-no-wrap text-truncate">
                Date
              </v-col>
            </v-row>
            <v-row no-gutters>
              <v-col style="overflow: auto;">
                <v-row no-gutters class="flex-nowrap" style="height: 40px;" v-for="cl,i in colLabels" v-if="settings.dateDisplay.includes(i)" :style="{ width: (settings.columnWidth * numberOfColumn) + 'px'}" :key="i">
                  <v-col cols="auto" class="d-flex" v-for="c,j in cl" :key="j" style="border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: white; min-width: 0;"  :style="{ width: (settings.columnWidth * c.count) + 'px'  }">
                    <v-row no-gutters justify="center" align="center" style="max-width: 100%" :title="c.value">
                      <v-col cols="auto" class="text-no-wrap text-truncate" style="min-width: 0;">{{ c.value }}</v-col>
                    </v-row>
                  </v-col>
                </v-row>
                <v-row no-gutters :style="{ width: (settings.columnWidth * numberOfColumn) + 'px' }">
                  <v-col cols="0" :style="{ height: (settings.rowHeight * taskToDisplay.length) + 'px' }" class="d-flex flex-column">
                    <v-row no-gutters class="flex-nowrap" style="position: relative;" v-for="taskId,m in taskToDisplay" :key="m">
                      <v-col cols="0" class="d-flex" v-for="cl,i in numberOfColumn" :key="i" style="border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: white">
                        <v-row no-gutters justify="center" align="center">
                          <v-col cols="auto"></v-col>
                        </v-row>
                      </v-col>
                      <v-card class="d-flex align-self-center" outlined tile height="80%" :min-width="getBarWidth(taskId, 'planned') + 'px'" style="position:absolute;" :style="{left: getDatePos(taskId, 'planned')+'px', 'background-color': colorList[(taskId[taskId.length-1])%colorList.length]}"></v-card>
                    </v-row>    
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        
        <template v-if="tasks.length > 0">
          <v-row no-gutters class="pt-2">
            <v-col class="font-weight-black">Descriptions</v-col>
          </v-row>
          <v-row no-gutters class="pt-2">
            <task-description-list :task-list="tasks"></task-description-list>
          </v-row>
        </template>
      </v-container>
    </template>

    <template id="gantt-settings">
      <v-btn icon title="settings" @click="isOpened = !isOpened; updateValue()">
        <v-icon>mdi-settings</v-icon>
        <v-dialog v-model="isOpened" max-width="1000px">
          <v-card>
            <v-card-title>Settings</v-card-title>
            <v-card-text>
              <v-row no-gutters><v-col><v-text-field hide-details v-model="ganttChartName" label="Gantt chart name"></v-text-field></v-col></v-row>
              <v-row no-gutters justify="center" align="center" class="mt-1">
                <v-col class="font-weight-black">Edit mode</v-col>
                <v-col cols="auto"><v-switch inset v-model="editMode"></v-switch></v-col>
              </v-row>
              <v-row no-gutters justify="center" align="center" class="mt-1">
                <v-col class="font-weight-black">Date display</v-col>
                <v-col cols="auto"><v-btn-toggle v-model="dateDisplay" multiple><v-btn v-for="d in ['year', 'month', 'day']" :key="d">{{ d }}</v-btn></v-btn-toggle></v-col>
              </v-row>
              <v-row no-gutters><v-col><v-text-field type="number" hide-details label="Date column width" min="1" suffix="px" prepend-icon="mdi-arrow-expand-horizontal" v-model="columnWidth" class="pb-2"></v-text-field></v-col></v-row>
              <v-row no-gutters><v-col><v-text-field type="number" hide-details label="Row height" min="1" suffix="px" prepend-icon="mdi-arrow-expand-vertical" v-model="rowHeight" class="pb-2"></v-text-field></v-col></v-row>
              <v-row no-gutters><v-col class="font-weight-black pt-2">Color Scheme</v-col></v-row>
              <v-row no-gutters><v-col><v-select hide-details v-model="numberOfClass" :items="[3,4,5,6,7,8,9,'custom']" label="Number of classes" class="pb-2"></v-select></v-col></v-row>
              <v-row no-gutters class="flex-nowrap" style="overflow:auto" v-if="numberOfClass!='custom'">
                <v-col v-for="cs in Object.keys(colorbrewer)" :key="cs">
                  <v-card tile outlined 
                    class="ma-1" 
                    width="50px" max-width="50px" 
                    :title="cs" 
                    v-if="colorbrewer[cs][numberOfClass]" 
                    :style="{ 'background-color': cs==selectedScheme ? '#607D8B' : '#ECEFF1' }"
                    @click="selectedScheme=cs">
                    <v-card-text>
                      <v-row v-for="color in colorbrewer[cs][numberOfClass]" :key="cs+color" justify="center">
                        <v-col cols="10" :style="{ 'background-color': color }"></v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
              </v-row>
              <v-row no-gutters v-else>
                <v-col cols="12">
                  <v-col cols="12">
                    <v-row no-gutters>
                      <v-col cols="auto" v-for="cs,i in customScheme" :key="i" class="ma-1 pa-1">
                        <v-card flat height="30px" width="50px" 
                          :style="{ 'background-color': cs.color }" 
                          :title="cs.color"
                        ></v-card>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-expansion-panels v-model="customPanel">
                    <template v-for="cs,i in customScheme">
                      <v-col cols="12" :key="i">
                        <v-btn min-width="100%" @click="addNewColor(i)">Add <v-icon>mdi-playlist-plus</v-icon></v-btn>
                      </v-col>
                      <v-expansion-panel>
                        <v-expansion-panel-header>
                          <v-row no-gutters align="center">
                            <v-col cols="auto"><v-btn icon @click.stop="customScheme.splice(i,1)"><v-icon>mdi-minus</v-icon></v-btn></v-col>
                            <v-col cols="auto" class="pr-1">{{ i+1 }}</v-col>
                            <v-col>
                              <v-row no-gutters justify="center" align="center">
                                <v-col cols="8"><v-card flat height="30px" :style="{ 'background-color': cs.color }"></v-card></v-col>
                              </v-row>
                            </v-col>
                          </v-row>
                        </v-expansion-panel-header>
                        <v-expansion-panel-content><color-chooser v-model="customScheme[i]" @selected="customPanel = null"></color-chooser></v-expansion-panel-content>
                      </v-expansion-panel>
                    </template>
                    <v-col cols="12" class="mt-2">
                      <v-btn min-width="100%" @click="addNewColor()">Add <v-icon>mdi-playlist-plus</v-icon></v-btn>
                    </v-col>
                  </v-expansion-panels>
                </v-col>
              </v-row>
            </v-card-text>
            <v-card-actions>
              <v-btn text @click="isOpened = !isOpened; $emit('remove');">Delete</v-btn>
              <v-spacer></v-spacer>
              <v-btn text @click="isOpened = !isOpened; confirmSettings();">Ok</v-btn>
              <v-btn text @click="isOpened = !isOpened">Cancel</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-btn>
    </template>
    
    <template id="color-chooser">
      <v-card>
        <v-card-text>
          <v-row>
            <v-tabs grow v-model="customColorTab">
              <v-tab>Palette</v-tab>
              <v-tab>Scheme</v-tab>
            </v-tabs>
            <v-tabs-items v-model="customColorTab" style="width:100%">
              <v-tab-item>
                <v-card flat>
                  <v-card-text>
                    <v-row no-gutters>
                      <v-col>
                        <v-slider v-model="minVal" prepend-icon="mdi-palette" min="0" max="200" :label="minVal.toString()" inverse-label></v-slider>
                      </v-col>
                    </v-row>
                    <v-row no-gutters>
                      <v-col>
                        <v-slider v-model="totalChoice" prepend-icon="mdi-music-accidental-sharp" min="6" step="6" max="300" :label="totalChoice.toString()" inverse-label></v-text-field>
                      </v-col>
                    </v-row>
                    <v-row no-gutters>
                      <v-col cols="auto" v-for="cp,i in colorPalette" :key="i" class="ma-1 pa-1" 
                        :style="{ border: '1px solid', 'border-color': cp == value.color ? '#333' : '#fff'}">
                        <v-card hover flat height="30px" width="50px" 
                          :style="{ 'background-color': cp }" 
                          :title="cp"
                          @click="selectColor(cp)"
                        ></v-card>
                      </v-col>
                    </v-row>
                    <v-row no-gutters>
                      <v-col cols="auto" v-for="gp,i in greyPalette" :key="i" class="ma-1 pa-1" 
                        :style="{ border: '1px solid', 'border-color': gp == value.color ? '#333' : '#fff'}">
                        <v-card hover flat height="30px" width="50px" 
                          :style="{ 'background-color': gp }" 
                          :title="gp"
                          @click="selectColor(gp)"
                        ></v-card>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <v-tab-item>
                <v-card flat>
                  <v-card-text>
                    <v-row no-gutters justify="center">
                      <v-col cols="auto">
                        <v-row no-gutters v-for="cs in Object.keys(colorbrewer)" :key="cs" v-if="colorbrewer[cs][9]">
                          <v-col cols="auto" v-for="color in colorbrewer[cs][9]" :key="color" class="ma-1 pa-1" 
                            :style="{ border: '1px solid', 'border-color': color == value.color ? '#333' : '#fff'}">
                            <v-card hover flat height="30px" width="50px" 
                              :style="{ 'background-color': color }" 
                              :title="color"
                              @click="selectColor(color)"
                            ></v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>  
              </v-tab-item>
            </v-tabs-items>
          </v-row>
        </v-card-text>
      </v-card>
    </template>

    <template id="task-title">
      <v-row no-gutters justify="start" align="center" @click="openDetails" style="cursor: pointer" draggable :class="additionalClass">
        <v-col>
          <v-row no-gutters align="center" class="flex-nowrap">
            <v-col cols="auto" v-if="editMode" class="pl-1"><v-icon>mdi-cursor-move</v-icon></v-col>
            <v-col cols="0" class="pl-1 pr-1 text-no-wrap text-truncate" :title="value.description">
              <slot v-bind:value="value"><v-icon v-if="value.subtasks.length>0" @click.stop="value.collapsed = !value.collapsed">{{ value.collapsed ? 'mdi-chevron-right' : 'mdi-chevron-down' }}</v-icon>{{ value.name }}</slot>
            </v-col>
            <v-col cols="auto"><v-btn icon small v-if="editMode" @click.stop="$emit('remove')"><v-icon>mdi-minus</v-icon></v-btn></v-col>
          </v-row>
          <v-dialog v-model="isOpened" max-width="1000px">
            <v-card>
              <v-card-title>Task details</v-card-title>
              <v-card-text>
                <v-row no-gutters class="mb-4"><v-col><v-text-field hide-details v-model="details.name" label="Task name"></v-text-field></v-col></v-row>
                <v-row no-gutters class="mb-4"><v-col><v-textarea outlined hide-details v-model="details.description" label="Task description"></v-textarea></v-col></v-row>
                <v-row no-gutters class="mb-4">
                  <v-col>
                    <v-menu
                      ref="planned"
                      v-model="plannedMenu"
                      :close-on-content-click="false"
                      :return-value.sync="details.planned"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          hide-details
                          prepend-icon="mdi-calendar"
                          v-model="plannedText"
                          label="Planned date"
                          readonly
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="details.planned" range no-title scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text @click="$refs.planned.save(details.planned)">OK</v-btn>
                        <v-btn text @click="plannedMenu = false">Cancel</v-btn>
                      </v-date-picker>
                    </v-menu>
                  </v-col>
                </v-row>
                <v-row no-gutters class="mb-4">
                  <v-col>
                    <v-menu
                      ref="actual"
                      v-model="actualMenu"
                      :close-on-content-click="false"
                      :return-value.sync="details.actual"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          hide-details
                          prepend-icon="mdi-calendar"
                          v-model="actualText"
                          label="Actual date"
                          readonly
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="details.actual" range no-title scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text @click="$refs.actual.save(details.actual)">OK</v-btn>
                        <v-btn text @click="actualMenu = false">Cancel</v-btn>
                      </v-date-picker>
                    </v-menu>
                  </v-col>
                </v-row>
                <v-row no-gutters><v-col class="font-weight-black">Subtasks</v-col></v-row>
                <task-title no-gutters v-for="task,i in details.subtasks" :key="i" class="pa-3"
                  :style="i == details.subtasks.length - 1 ? 'background-color: white' : 'border-bottom: 1px solid #ddd; background-color: white'"
                  :edit-mode="true"
                  v-model="details.subtasks[i]"
                  @remove="removeSubtask(i)"
                  v-slot:default="props"
                  @dragstart="startDragSubTask($event,i)"
                  @drop="dropSubTask($event,i)"
                >
                  <v-row no-gutters>
                    <v-col cols="6" class="text-no-wrap text-truncate" :title="props.value.name">{{ props.value.name }}</v-col>
                    <v-col cols="3" class="text-no-wrap text-truncate" :title="'planned: ' + props.value.planned[0] + ' ~ ' + props.value.planned[1]" class="text-center">{{ props.value.planned[0] + ' ~ ' + props.value.planned[1] }}</v-col>
                    <v-col cols="3" class="text-no-wrap text-truncate" :title="'actual: ' + props.value.actual[0] + ' ~ ' + props.value.actual[1]" class="text-center">{{ props.value.actual[0] + ' ~ ' + props.value.actual[1] }}</v-col>
                  </v-row>
                </task-title>
                <v-btn depressed tile block @click="addNewSubtask"><v-icon>mdi-plus</v-icon></v-btn>
              </v-card-text>
              <v-card-actions>
                <v-btn text @click="isOpened = !isOpened; $emit('remove')">Delete</v-btn>
                <v-spacer></v-spacer>
                <v-btn text @click="isOpened = !isOpened; confirmChanges();">Ok</v-btn>
                <v-btn text @click="isOpened = !isOpened">Cancel</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-col>
      </v-row>
    </template>

    <template id="task-description-list">
      <v-expansion-panels accordion multiple>
        <task-description v-for="t,i in taskList" :key="i" :task="t" :task-number="i+1"></task-description>
      </v-expansion-panels>
    </template>

    <template id="task-description">
      <v-expansion-panel>
        <v-expansion-panel-header>
          <v-row no-gutters>
            <v-col cols="auto" class="pr-2">{{ taskNumber }}</v-col>
            <v-col cols="auto" class="pr-2">|</v-col>
            <v-col>{{ task.name }}</v-col>
          </v-row>
        </v-expansion-panel-header>
        <v-expansion-panel-content v-if="task.subtasks.length > 0 || task.description !== ''">
          <v-row no-gutters><v-col>{{ task.description }}</v-col></v-row>
          <v-row no-gutters v-if="task.subtasks" class="pt-3"><v-col><task-description-list :task-list="task.subtasks"></task-description-list></v-col></v-row>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </template>

    <template id="file-dialog">
      <v-dialog :value="value" @input="changeValue" content-class="file-dialog" scrollable>
        <v-card :loading="loading">
          <v-card-title v-if="title">{{ title }}</v-card-title>
          <v-card-title v-else>File</v-card-title>
          
          <v-card-actions class="pt-1 pb-0">
            <v-row no-gutters align="center">
              <v-col cols="auto" align-self="center" v-if="currentFolder.id" class="pr-2">
                <v-btn tile icon small @click.stop="goUp" v-if="currentFolder.parents.length > 0"><v-icon>mdi-chevron-left</v-icon></v-btn>
                <v-btn tile icon small v-else><v-icon>mdi-google-drive</v-icon></v-btn>
              </v-col>
              <v-col>{{ currentFolder.name }}</v-col>
              <v-col cols="auto">
                <v-switch inset v-model="showId" label="Show ID" dense hide-details class="mt-0 pt-0 pr-1"></v-switch>
              </v-col>
              <v-col cols="auto" class="d-flex pl-2 pr-2" :class="showAddFolder ? 'grey lighten-2' : ''" v-if="currentFolder.id && !hideNewFolder">
                <v-row no-gutters align="center" class="flex-grow-1">
                  <v-col><v-btn tile icon small title="New folder" @click="showAddFolder = !showAddFolder"><v-icon>mdi-folder-plus</v-icon></v-btn></v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-card-actions>
          <v-card-actions class="pt-0 pb-0" v-if="showAddFolder">
            <v-row no-gutters align="center" class="grey lighten-2 pb-2 pl-2">
              <v-col><v-text-field hide-details class="mr-2" v-model="newFolderName" color="grey"></v-text-field></v-col>
              <v-col cols="auto" class="pl-2 pr-2"><v-btn tile icon small @click="createFolder"><v-icon>mdi-plus</v-icon></v-btn></v-col>
            </v-row>
          </v-card-actions>

          <v-divider></v-divider>

          <v-card-text>
            <v-list class="pa-0">
              <v-list-item v-for="f,i in files" :key="i" @click.stop="launchFile(f)" color="white" :input-value="highlightSelectedFile && f.id == selectedFileId" :class="highlightSelectedFile && f.id == selectedFileId ? 'primary' : ''">
                <v-list-item-avatar tile class="mt-0 mb-0"><v-icon>{{ getFileIcon(f.mimeType) }}</v-icon></v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>
                    <v-row no-gutters align="end">
                      <v-col cols="auto">{{ f.name }}</v-col>
                      <v-col class="text-no-wrap text-truncate grey--text subtitle-2" v-show="showId">&nbsp;-&nbsp;{{ f.id }}</v-col>
                    </v-row>
                </v-list-item-content>
              </v-list-item>
              <v-list-item v-if="nextPageToken" @click.stop="listFile(currentFolder.id)" title="load more">
                <v-list-item-content>
                  <v-list-item-title class="text-center"><v-icon>mdi-chevron-down</v-icon></v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions class="pt-7 pb-3">
            <v-toolbar dense flat>
              <v-text-field label="Filename" v-model="newFilename" class="mr-2" suffix=".pgjson" :rules="[value => !!value || 'Required.']" :readonly="fileEntryReadOnly"></v-text-field>
              <v-btn color="primary" :disabled="newFilename == '' || loading" class="mr-2" depressed @click.stop="saveFile">{{ actionName }}</v-btn>
              <v-btn color="secondary" depressed @click.stop="closeDialog">Cancel</v-btn>
            </v-toolbar>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </template>

    <template id="help-dialog">
      <v-dialog :value="value" @input="changeValue" content-class="help-dialog" scrollable>
        <v-card>
          <v-card-title><v-icon>mdi-help-circle</v-icon>&nbsp;Help</v-card-title>
          <v-divider></v-divider>
          <v-card-text class="pt-5">
            <v-expansion-panels>
              <v-expansion-panel v-for="c,i in content" :key="i">
                <v-expansion-panel-header v-html="c.title"></v-expansion-panel-header>
                <v-expansion-panel-content>{{ c.content }}</v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-spacer></v-spacer><v-btn color="primary" depressed @click.stop="closeDialog">Close</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </template>

    <script src="./colorbrewer.js"></script>
    <script src="//cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="//cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script>
      let oneday = 1000*60*60*24;
      let startDay = new Date();
      startDay = startDay.getFullYear() + '-' + (startDay.getMonth()+1).toString().padStart(2,'0') + '-' + startDay.getDate().toString().padStart(2,'0');
      let endDay = new Date(Date.now() + 30*oneday); 
      endDay = endDay.getFullYear() + '-' + (endDay.getMonth()+1).toString().padStart(2,'0') + '-' + endDay.getDate().toString().padStart(2,'0');

      Vue.component('gantt-chart-list-item', {
        template: "#gantt-chart-list-item",
        props: ['itemName'],
        mounted: function () {
          this.$el.addEventListener("drag", (ev) => { this.$emit('drag', ev); });
          this.$el.addEventListener("dragstart", (ev) => { this.$emit('dragstart', ev); });
          this.$el.addEventListener("dragend", (ev) => { this.$emit('dragend', ev); });
          this.$el.addEventListener("dragover", (ev) => { ev.preventDefault(); this.dragover = true; this.$emit('dragover', ev); });
          this.$el.addEventListener("dragenter", (ev) => { this.$emit('dragenter', ev); });
          this.$el.addEventListener("dragleave", (ev) => { this.dragover = false; this.$emit('dragleave', ev); });
          this.$el.addEventListener("drop", (ev) => { ev.preventDefault(); this.dragover = false; this.$emit('drop', ev); });
        },
        data: function () { 
          return {
            dragover: false
          }; 
        },
        computed: {
          additionalClass: function () { return this.dragover ? ['teal', 'lighten-5'] : [] }
        }
      });

      Vue.component('gantt-chart', {
        template: '#gantt-chart',
        props: ['value', 'isAppAuthorized'],
        mounted: function () { this.initiate(); },
        watch: {
          isAppAuthorized: function (newVal) {
            if (newVal) { this.settings.editMode = true; }
          }
        },
        computed: {
          colorList: function () {
            if (this.settings.numberOfClass == 'custom') {
              return this.settings.customScheme.map(x => x.color);
            } else {
              return colorbrewer[this.settings.selectedScheme][this.settings.numberOfClass];
            }
          },
          minDate: function () {
            let md = Math.min(...this.getTaskTime(this.tasks, ['planned', 'actual']));
            if (md == Infinity) { return (new Date()).valueOf(); }
            else { return md; }
          },
          maxDate: function () {
            let md = Math.max(...this.getTaskTime(this.tasks, ['planned', 'actual']));
            if (md == -Infinity) { return (new Date()).valueOf() + 100*oneday; }
            else { return md + oneday; }
          },
          colLabels: function () {
            let n = Math.ceil((this.maxDate - this.minDate)/oneday);
            let labels = Array(n).fill(0).map((v,i) => i*oneday + this.minDate);
            let monthLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            labels = labels.map(v => {
              x = new Date(v);
              return {
                date: x.getDate().toString(),
                month: monthLabels[x.getMonth()],
                year: x.getFullYear().toString()
              }
            });
            let aggregator = (acc, cur) => {
              if ((acc.length > 0) && (cur == acc[acc.length-1].value)) { acc[acc.length - 1].count++; }
              else { acc.push({ value: cur, count: 1 }); }
              return acc;
            }
            labels = [
              labels.map(v => v.year).reduce(aggregator, []),
              labels.map(v => v.month).reduce(aggregator, []),
              labels.map(v => v.date).reduce(aggregator, [])
            ]
            return labels;
          },
          numberOfColumn: function () {
            return this.colLabels[0].reduce((acc, cur) => acc + cur.count, 0);
          },
          taskToDisplay: function () {
            let getTaskToDisplay = (tasks, parent) => {
              let list = tasks.map((task, idx) => {
                let cTaskIdx = parent.concat([idx])
                let subtaskIdx = [];
                if (!task.collapsed) {
                  subtaskIdx = getTaskToDisplay(task.subtasks, cTaskIdx);
                }
                return [cTaskIdx].concat(subtaskIdx);
              });
              return list.reduce((acc, cur) => {
                return acc.concat(cur);
              }, []).filter(val => val.length != 0);
            };
            return getTaskToDisplay(this.tasks, []);
          }
        },
        data: function () {
          return {
            colorbrewer: colorbrewer,
            settings: {
              ganttChartName: "Gantt chart name",
              numberOfClass: 3,
              selectedScheme: 'PuBu',
              customScheme: [],
              rowHeight: 40,
              columnWidth: 28,
              dateDisplay: [0,1,2],
              editMode: true && this.isAppAuthorized
            },
            tasks: [],
            reorderDialog: false
          }
        },
        methods: {
          initiate: function () {
            this.settings.ganttChartName = this.value.ganttChartName;
            this.settings.numberOfClass = this.value.numberOfClass;
            this.settings.selectedScheme = this.value.selectedScheme;
            this.settings.customScheme = this.value.customScheme;
            this.settings.rowHeight = this.value.rowHeight;
            this.settings.columnWidth = this.value.columnWidth;
            this.settings.dateDisplay = this.value.dateDisplay;
            this.tasks = this.value.tasks;
          },
          addNewTask: function () {
            this.tasks.push({
              name: 'Task ' + (this.tasks.length + 1),
              description: '',
              planned: [startDay, endDay],
              actual: [startDay, endDay],
              subtasks: [],
              collapsed: true
            });
            this.emitInput();
          },
          getTaskTime: function (tasks, keys) {
            let list = tasks.map((task, ind, arr) => {
              let timeInTask = [];
              keys.forEach(k => {
                timeInTask = timeInTask.concat(task[k]);
              });
              let timeInSubtasks = this.getTaskTime(task.subtasks, keys);
              return timeInTask.concat(timeInSubtasks);
            });
            return list
            .reduce((acc, cur) => {
              return acc.concat(cur);
            }, [])
            .filter((val, ind, arr) => {
              return arr.indexOf(val) == ind;
            })
            .map(val => new Date(val));
          },
          getDatePos: function (taskId, key) {
            let task;
            taskId.forEach((id, i) => {
              if (i == 0) { task = this.tasks[id]; }
              else { task = task.subtasks[id]; }
            });
            let date = task[key][0];
            let curDate = (new Date(date).valueOf());
            return (curDate - this.minDate) / (this.maxDate - this.minDate) * (this.settings.columnWidth*this.numberOfColumn);
          },
          getBarWidth: function (taskId, key) {
            let task;
            taskId.forEach((id, i) => {
              if (i == 0) { task = this.tasks[id]; }
              else { task = task.subtasks[id]; }
            });
            let dateRange = task[key];
            let curRange = [(new Date(dateRange[0])).valueOf(), (new Date(dateRange[1])).valueOf() + oneday];
            return (curRange[1] - curRange[0]) / (this.maxDate - this.minDate) * (this.settings.columnWidth*this.numberOfColumn);
          },
          getTaskId: function (taskId) {
            return taskId.map(x => x+1).join('.');
          },
          getTaskFromId: function (taskId) {
            let task;
            taskId.forEach((id, i) => {
              if (i == 0) { task = this.tasks[id]; }
              else { task = task.subtasks[id]; }
            });
            return task;
          },
          setTaskFromId: function (taskId, event) {
            let task;
            taskId.forEach((id, i) => {
              if (i == 0) { task = this.tasks[id]; }
              else { task = task.subtasks[id]; }
            });
            task.actual = event.actual;
            task.description = event.description;
            task.name = event.name;
            task.planned = event.planned;
            task.subtasks = event.subtasks;
            this.emitInput();
          },
          removeTaskWithId: function (taskId) {
            let task;
            taskId.forEach((id, i, arr) => {
              if (i == 0) { task = this.tasks; }
              else { task = task.subtasks; }

              if (i == arr.length - 1) { task.splice(id, 1); }
              else { task = task[id] }
            });
            this.emitInput();
          },
          reduceColWidth: function () {
            if (this.settings.columnWidth > 1) {
              let newCW = this.settings.columnWidth - 1;
              if (newCW < 1) { newCW = 1; }
              this.settings.columnWidth = newCW;
            } else { this.settings.columnWidth *= 0.7; }
            this.emitInput();
          },
          increaseColWidth: function () {
            if (this.settings.columnWidth > 1) { this.settings.columnWidth += 1; } 
            else { this.settings.columnWidth /= 0.7; }
            this.emitInput();
          },
          reduceRowHeight: function () {
            if (this.settings.rowHeight > 1) {
              let newCW = this.settings.rowHeight - 1;
              if (newCW < 1) { newCW = 1; }
              this.settings.rowHeight = newCW;
            } else { this.settings.rowHeight *= 0.7; }
            this.emitInput();
          },
          increaseRowHeight: function () {
            if (this.settings.rowHeight > 1) { this.settings.rowHeight += 1; } 
            else { this.settings.rowHeight /= 0.7; }
            this.emitInput();
          },
          emitInput: function () {
            this.$emit('input', {
              ganttChartName: this.settings.ganttChartName,
              numberOfClass: this.settings.numberOfClass,
              selectedScheme: this.settings.selectedScheme,
              customScheme: this.settings.customScheme,
              rowHeight: this.settings.rowHeight,
              columnWidth: this.settings.columnWidth,
              dateDisplay: this.settings.dateDisplay,
              tasks: this.tasks
            });
          },
          startDragTask: function (ev, taskId) { ev.dataTransfer.setData('taskId', JSON.stringify(taskId)); },
          dropTask: function (ev, taskId) { 
            let droppedId = ev.dataTransfer.getData('taskId');
            let thisId = JSON.stringify(taskId);
            if (droppedId != thisId) { this.$emit('reorder-task', [droppedId, thisId]); }
          }
        }
      });

      Vue.component('gantt-settings', {
        template: '#gantt-settings',
        props: ['value'],
        data: function () {
          return {
            colorbrewer: colorbrewer,
            isOpened: false,
            dateDisplay: 0,
            ganttChartName: "",
            numberOfClass: 3,
            selectedScheme: 'PuBu',
            customScheme: [],
            customColorDefault: {
              tab: 0,
              palette: {
                hue: 100,
                n: 60
              },
              color: "#ff6464"
            },
            customPanel: null,
            rowHeight: 40,
            columnWidth: 40,
            editMode: true
          }
        },
        methods: {
          updateValue: function () {
            this.ganttChartName = this.value.ganttChartName;
            this.numberOfClass = this.value.numberOfClass;
            this.selectedScheme = this.value.selectedScheme;
            this.customScheme = this.value.customScheme;
            this.rowHeight = this.value.rowHeight;
            this.columnWidth = this.value.columnWidth;
            this.dateDisplay = this.value.dateDisplay;
            this.editMode = this.value.editMode;
          },
          addNewColor: function (i) {
            if (i == null) { this.customScheme.push(JSON.parse(JSON.stringify(this.customColorDefault))); }
            else { this.customScheme.splice(i, 0, JSON.parse(JSON.stringify(this.customColorDefault))); }
          },
          confirmSettings: function () {
            this.$emit('input', {
              ganttChartName: this.ganttChartName,
              numberOfClass: this.numberOfClass,
              selectedScheme: this.selectedScheme,
              customScheme: this.customScheme,
              rowHeight: this.rowHeight,
              columnWidth: this.columnWidth,
              dateDisplay: this.dateDisplay,
              editMode: this.editMode
            });
          }
        }
      });

      Vue.component('color-chooser', {
        template: '#color-chooser',
        computed: {
          numSep: function () {
            return Math.ceil(this.totalChoice/6);
          },
          sepVal: function () {
            return Math.floor((255 - this.minVal)/this.numSep);
          },
          maxVal: function () {
            return this.sepVal*this.numSep + this.minVal;
          },
          colorPalette: function () {
            return Array(6*this.numSep)
              .fill(0)
              .map((x,i) => {
                let r = 0;
                let g = 0;
                let b = 0;
                if (i <= this.numSep) { r = this.maxVal; }
                else if (i <= 2*this.numSep) { r = this.maxVal - (i - this.numSep)*this.sepVal; }
                else if (i <= 4*this.numSep) { r = this.minVal; }
                else if (i <= 5*this.numSep) { r = this.minVal + (i - 4*this.numSep)*this.sepVal; }
                else { r = this.maxVal; }

                if (i <= this.numSep) { g = this.minVal + i*this.sepVal; }
                else if (i <= 3*this.numSep) { g = this.maxVal; }
                else if (i <= 4*this.numSep) { g = this.maxVal - (i - 3*this.numSep)*this.sepVal; }
                else { g = this.minVal; }

                if (i <= 2*this.numSep) { b = this.minVal; }
                else if (i <= 3*this.numSep) { b = this.minVal + (i - 2*this.numSep)*this.sepVal; }
                else if (i <= 5*this.numSep) { b = this.maxVal; }
                else { b = this.maxVal - (i - 5*this.numSep)*this.sepVal; }

                return '#' + r.toString(16).padStart(2, '0')
                + g.toString(16).padStart(2, '0')
                + b.toString(16).padStart(2, '0');
              });
          },
          greyPalette: function () {
            let gp = [];
            let val = 255;
            let sep = 17;
            gp.push('#' + val.toString(16).padStart(2,0) + val.toString(16).padStart(2,0) + val.toString(16).padStart(2,0));
            do {
              val -= sep;
              gp.push('#' + val.toString(16).padStart(2,0) + val.toString(16).padStart(2,0) + val.toString(16).padStart(2,0));
            } while (val > 0)
            return gp;
          }
        },
        data: function () {
          return {
            colorbrewer: colorbrewer,
            customColorTab: 0,
            minVal: 100,
            totalChoice: 60,
            value: {
              tab: 0,
              palette: {
                hue: 100,
                n: 60
              },
              color: "#000000"
            }
          }
        },
        methods: {
          add: function (x,y) {
            return x + y;
          },
          minus: function (x,y) {
            return x - y;
          },
          selectColor: function (newColor) {
            this.value.color = newColor;
            this.value.tab = this.customColorTab;
            this.value.palette.hue = this.minVal;
            this.value.palette.n = this.totalChoice;
            this.$emit("input", this.value);
            this.$emit("selected", this.value);
          }
        }
      });

      Vue.component('task-title', {
        template: '#task-title',
        props: ['value', 'editMode'],
        mounted: function () {
          this.$el.addEventListener("drag", (ev) => { this.$emit('drag', ev); });
          this.$el.addEventListener("dragstart", (ev) => { this.$emit('dragstart', ev); });
          this.$el.addEventListener("dragend", (ev) => { this.$emit('dragend', ev); });
          this.$el.addEventListener("dragover", (ev) => { ev.preventDefault(); this.dragover = true; this.$emit('dragover', ev); });
          this.$el.addEventListener("dragenter", (ev) => { this.$emit('dragenter', ev); });
          this.$el.addEventListener("dragleave", (ev) => { this.dragover = false; this.$emit('dragleave', ev); });
          this.$el.addEventListener("drop", (ev) => { ev.preventDefault(); this.dragover = false; this.$emit('drop', ev); });
        },
        data: function () {
          return {
            details: {},
            isOpened: false,
            plannedMenu: false,
            actualMenu: false,
            dragover: false
          };
        },
        computed: {
          plannedText: function () { return this.details.planned[0] + ' ~ ' + this.details.planned[1]; },
          actualText: function () { return this.details.actual[0] + ' ~ ' + this.details.actual[1]; },
          additionalClass: function () { return this.dragover ? ['teal', 'lighten-5'] : [] }
        },
        methods: {
          openDetails: function () { 
            if (this.isOpened == false) {
              this.isOpened = true; 
              this.details = JSON.parse(JSON.stringify(this.value));
            }
          },
          confirmChanges: function () {
            this.$emit('input', this.details);
          },
          addNewSubtask: function () {
            this.details.subtasks.push({
              name: 'Subtask ' + (this.details.subtasks.length + 1),
              description: '',
              planned: [startDay, endDay],
              actual: [startDay, endDay],
              subtasks: [],
              collapsed: true
            });
          },
          removeSubtask: function (i) {
            this.details.subtasks.splice(i,1);
          },
          startDragSubTask: function (ev, taskId) { ev.dataTransfer.setData('taskId', JSON.stringify(taskId)); },
          dropSubTask: function (ev, taskId) { 
            let droppedId = ev.dataTransfer.getData('taskId');
            let thisId = JSON.stringify(taskId);
            // console.log(droppedId, thisId);
            let taskToMove = this.details.subtasks.splice(droppedId,1)[0];
            if (droppedId >= thisId) { this.details.subtasks.splice(thisId,0,taskToMove); }
            else { this.details.subtasks.splice(thisId-1,0,taskToMove); }
          }
        }
      });

      Vue.component('task-description-list', {
        template: '#task-description-list',
        props: ['taskList'],
        data: function () { return { }; }
      });

      Vue.component('task-description', {
        template: '#task-description',
        props: ['task', 'taskNumber'],
        data: function () { return {}; }
      });

      Vue.component('file-dialog', {
        template: '#file-dialog',
        props: {
          value: Boolean,
          title: String,
          folder: Boolean,
          startLocation: Array,
          hideNewFolder: Boolean,
          actionName: String,
          fileEntryReadOnly: Boolean,
          highlightSelectedFile: Boolean
        },
        watch: {
          value: function (newVal, oldVal) {
            if (newVal) { 
              this.currentFolder.name = "";
              this.currentFolder.id = "";
              this.currentFolder.parents = [];
              this.files = [];
              this.listFile( this.startLocation.length > 0 ? this.startLocation[0] : null );
            } else {
              this.showAddFolder = false;
            }
          },
          showAddFolder: function (newVal, oldVal) {
            if (newVal) {}
            else { this.newFolderName = ""; }
          }
        },
        data: function () {
          return {
            currentFolder: {
              name: "",
              id: "",
              parents: []
            },
            selectedFileId: "",
            newFilename: "",
            nextPageToken: "",
            loading: false,
            files: [],
            showAddFolder: false,
            newFolderName: "",
            showId: false
          }
        },
        methods: {
          changeValue: function (event) { this.$emit('input', event); },
          closeDialog: function () { this.$emit('input', false); },
          listFile: function (parent,replace=false) {
            let query = "trashed = false" + " and " + "'" + (parent ? parent : 'root') + "' in parents";
            let fileQueryStr = "";
            let mimeTypeQuery = ["application/vnd.google-apps.folder"];
            if (mimeTypeQuery.length > 0) { fileQueryStr += "(" + mimeTypeQuery.map(m => "mimeType = '" + m + "'").join(' or ') + ")"; }
            let extQuery = [".pgjson"];
            if (extQuery.length > 0) { fileQueryStr += " or (" + extQuery.map(e => "name contains '" + e + "'").join(' or ') + ")"; }
            query += " and (" + fileQueryStr + ")";
            console.log(query);
            let config = {
              orderBy: "folder, name",
              q: query,
              fields: "nextPageToken, files(id,name,mimeType,parents)"
            };
            if (this.nextPageToken) { config.pageToken = this.nextPageToken; }
            this.loading = true;
            return gapi.client.drive.files.list(config).then(resp => {
              console.log(resp.result);
              this.nextPageToken = resp.result.nextPageToken;
              this.files = replace ? resp.result.files : this.files.concat(resp.result.files);
              if (this.currentFolder.name == "") {
                return gapi.client.drive.files.get({
                  fileId: this.files[0].parents[0],
                  fields: "id,name,parents"
                }).then(resp => {
                  this.currentFolder.name = resp.result.name;
                  this.currentFolder.id = resp.result.id;
                  this.currentFolder.parents = resp.result.parents ? resp.result.parents : [];
                  this.loading = false;
                });
              } else { this.loading = false; }
            }, resp => { console.log(resp) });
          },
          getFileIcon: function (mimeType) {
            let fileIcon = [
              ['folder', 'folder'],
              ['powerpoint', 'file-powerpoint'],
              ['google-apps.presentation', 'file-presentation-box'],
              ['ms-excel', 'file-excel'],
              ['google-apps.spreadsheet', 'google-spreadsheet'],
              ['openxmlformats-officedocument.spreadsheetml.sheet', 'file-excel'],
              ['msword', 'file-word'],
              ['google-apps.document', 'file-document'],
              ['openxmlformats-officedocument.wordprocessingml.document', 'file-word'],
              ['google-apps.map', 'google-maps'],
              ['pdf', 'file-pdf'],
              ['zip', 'folder-zip'],
              ['rar', 'folder-zip'],
              ['image', 'file-image'],
              ['plain', 'file'],
              ['json', 'file-code'],
              ['video', 'file-video'],
              ['html', 'web-box'],
            ];
            let icons = fileIcon.filter(val => mimeType.includes(val[0]));
            return icons.length > 0 ? "mdi-" + icons[0][1] : "mdi-file-question";
          },
          launchFile: function (file) {
            if (file.mimeType.includes('folder')) { 
              this.currentFolder.name = file.name;
              this.currentFolder.id = file.id;
              this.currentFolder.parents = file.parents;
              this.nextPageToken = "";
              return this.listFile(file.id, true); 
            } else {
              this.newFilename = file.name.includes(".pgjson") ? file.name.replace(".pgjson", "") : file.name;
              this.selectedFileId = file.id;
            }
          },
          goUp: function () {
            this.currentFolder.name = "";
            this.currentFolder.id = "";
            this.nextPageToken = "";
            return this.listFile(this.currentFolder.parents[0], true);
          },
          createFolder: function () {
            if (this.newFolderName) {
              this.loading = true;
              return gapi.client.drive.files.create({
                resource: {
                  name: this.newFolderName,
                  mimeType: "application/vnd.google-apps.folder",
                  parents: this.currentFolder.id
                }
              }).then(resp => {
                if (resp.status == 200) { 
                  this.listFile(this.currentFolder.id, true).then(() => {
                    this.showAddFolder = false;
                    this.newFolderName = "";
                  }); 
                }
                else { 
                  this.loading = false;
                  this.showAddFolder = false;
                  this.newFolderName = ""; 
                } 
              }, resp => { 
                this.loading = false;
                this.showAddFolder = false;
                this.newFolderName = "";
              });
            } else { console.log("newFolderName is empty"); }
          },
          saveFile: function () {
            this.$emit("action", {
              folderId: this.currentFolder.id,
              filename: this.newFilename,
              fileId: this.selectedFileId
            });
            this.closeDialog();
          }
        }
      });

      Vue.component('help-dialog', {
        template: '#help-dialog',
        props: { value: Boolean },
        data: function () {
          return {
            content: [
              {
                title: "Autosave",
                content: "Autosave is executed every 20 seconds provided the file has already been stored on Google Drive."
              },
              {
                title: "Share file",
                // content: "To share file with other Google Drive users, share the file from Google Drive."
                content: "This app is not able to handle files from shared drive yet."
              },
              {
                title: "Planned/actual dates",
                content: "The Gantt charts only show the planned dates. Actual dates are not implemented yet."
              },
              // {
              //   title: "Print mode",
              //   content: "Print mode renders the Gantt charts in an expanded format to allow printing through the browser printing function."
              // },
              {
                title: "Others",
                content: "For specific enquiry, you may contact me (Richard Wong) at ricwtk[at]gmail.com"
              }
            ]
          }
        },
        methods: {
          changeValue: function (event) { this.$emit('input', event); },
          closeDialog: function () { this.$emit('input', false); },
        }
      });

      var vm = new Vue({
        el: '#app',
        vuetify: new Vuetify({
          theme: {
            themes: {
              light: {
                primary: '#009688',
                secondary: '#B2DFDB',
                accent: '#00BFA5'
              }
            }
          },
        }),
        mounted: function () {
          this.addNewGantt();
          this.autosave();
        },
        data: {
          colorbrewer: colorbrewer,
          drawer: true,
          gantts: [],
          gapiLoaded: false,
          isSignedIn: false,
          signInClick: () => {},
          signOutClick: () => {},
          disconnectClick: () => {},
          user: {
            id: "",
            name: "",
            email: "",
            imageUrl: ""
          },
          notice: "",
          showNotice: false,
          saveAsDialog: false,
          openFileDialog: false,
          helpDialog: false,
          cannotEditDialog: false,
          currentFile: {
            id: "",
            name: "",
            parents: [],
            isAppAuthorized: true
          },
          blockingLoading: false,
          blockingLoadingText: "loading text goes here",
          contentChanged: false,
          printMode: false
        },
        watch: {
          gapiLoaded: function (newVal, oldVal) {
            if (newVal) {
              gapi.auth2.getAuthInstance().isSignedIn.listen(this.updateSigninStatus);

              this.updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
              this.signInClick = () => { gapi.auth2.getAuthInstance().signIn(); };
              this.signOutClick = () => { gapi.auth2.getAuthInstance().signOut(); };
              this.disconnectClick = () => { gapi.auth2.getAuthInstance().disconnect(); };
            } else {
              this.signInClick = () => {};
              this.signOutClick = () => {};
              this.disconnectClick = () => {};
            }
          },
          gantts: function () {
            this.contentChanged = true;
          }
        },
        computed: {
          fileNameForDisplay: function () {
            if (this.currentFile.name.endsWith('.pgjson')) {
              return this.currentFile.name.slice(0, this.currentFile.name.lastIndexOf('.pgjson'));
            } else {
              return this.currentFile.name;
            }
          }
        },
        methods: {
          getNewGantt: function () {
            return {
              ganttChartName: 'Gantt Chart ' + (this.gantts.length + 1),
              numberOfClass: 3,
              selectedScheme: 'PuBu',
              customScheme: [],
              rowHeight: 40,
              columnWidth: 40,
              dateDisplay: [0,1,2],
              tasks: []
            };
          },
          addNewGantt: function () {
            this.gantts.push(this.getNewGantt());
          },
          updateSigninStatus: function (isSignedIn) {
            if (isSignedIn) {
              this.isSignedIn = true;
              let user = gapi.auth2.getAuthInstance().currentUser.get().getBasicProfile();
              this.user.id = user.getId();
              this.user.name = user.getName();
              this.user.email = user.getEmail();
              this.user.imageUrl = user.getImageUrl();
              let searchParams = new URLSearchParams(location.search);
              if (searchParams.get('user')) {
                if (this.user.id == searchParams.get('user')) {
                  if (searchParams.get('action') == "open") {
                    if (searchParams.get('file') && (this.currentFile.id !== searchParams.get('file'))) {
                      this.openFile({
                        filename: searchParams.get('file'),
                        fileId: searchParams.get('file')
                      });
                    }
                  } else if (searchParams.get('action') == "create") {
                    if (searchParams.get('folder')) {
                      this.blockingLoading = true;
                      this.blockingLoadingText = "Creating file...";
                      this.saveFile(searchParams.get('folder'), 'Untitled.pgjson', JSON.stringify(this.getNewGantt()))
                        .then(resp => {
                          this.updateQueryString(resp.result.id);
                          this.blockingLoadingText = "New file created";
                          this.gantts.splice(0, this.gantts.length);
                          this.$nextTick(() => { 
                            this.addNewGantt();
                            this.$nextTick(() => { this.contentChanged = false; });
                          });
                          setTimeout(() => { this.blockingLoading = false; }, 1000);
                        }, resp => {
                          this.newNotice('Unable to create new Project Gantt file in the provided folder');
                        });
                    }
                  }
                } else {
                  this.newNotice('Requested user and signed in user are different. File will not be opened/created.')
                }
              }
            } else {
              this.isSignedIn = false;
              this.user.id = '';
              this.user.name = '';
              this.user.email = '';
              this.user.imageUrl = '';
              if (location.search !== '') { this.newNotice("Sign in to access to the file"); }
            }
          },
          newInOld: function () {
            window.location.search = "";
          },
          newInNew: function () {
            window.open("./", "_blank");
          },
          newNotice: function (notice) {
            this.notice = notice;
            this.showNotice = true;
            setTimeout(() => { this.showNotice = false; }, 3000);
          },
          saveFile: function (folderId, filename, fileContent) {
            if (this.isSignedIn) {
              return gapi.client.request({
                path: "/upload/drive/v3/files",
                method: "POST",
                params: {
                  uploadType: "multipart"
                },
                headers: {
                  "Content-Type": "multipart/related; boundary=bounding"
                },
                body: "--bounding\n"
                  + "Content-Type: application/json; charset=UTF-8\n\n"
                  + JSON.stringify({
                      mimeType: "application/json",
                      name: filename.endsWith(".pgjson") ? filename : filename + ".pgjson",
                      parents: [folderId]
                    })
                  + "\n\n"
                  + "--bounding\n"
                  + "Content-Type: application/json\n\n"
                  + fileContent + "\n\n"
                  + "--bounding--"
              })

            } else {
              this.newNotice("Log in to save file to Google Drive");
            }
          },
          saveAs: function (fileMeta) {
            this.blockingLoading = true;
            this.blockingLoadingText = "Saving as file " + fileMeta.filename + "...";
            return this.saveFile(fileMeta.folderId, fileMeta.filename, JSON.stringify(this.gantts))
              .then(resp => this.getFileMeta(resp.result.id), resp => console.error(resp.result))
              .then(resp => {
                console.log(resp);
                this.updateQueryString(resp.result.id);
                this.currentFile.name = resp.result.name;
                this.currentFile.id = resp.result.id;
                this.currentFile.parents = resp.result.parents ? resp.result.parents : [];
                this.currentFile.isAppAuthorized = resp.result.isAppAuthorized;
                this.blockingLoadingText = "Saved in file " + this.currentFile.name;
                setTimeout(() => { this.blockingLoading = false; }, 1000);
                this.contentChanged = false;
              });
          },
          updateCurrentFile: function () {
            return gapi.client.request({
              path: "/upload/drive/v3/files/" + this.currentFile.id,
              method: "PATCH",
              params: {
                uploadType: "media"
              },
              body: JSON.stringify(this.gantts)
            }).then(resp => { this.contentChanged = false; });
          },
          justSave: function () {
            if (this.currentFile.id) {
              return this.updateCurrentFile().then(() => this.newNotice("File is saved"));
            } else {
              this.saveAsDialog = true;
            }
          },
          getFileMeta: function (fileId) {
            return gapi.client.drive.files.get({
              fileId: fileId,
              fields: "id,name,parents,isAppAuthorized"
            });
          },
          getFile: function (fileId) {
            return gapi.client.drive.files.get({
              fileId: fileId,
              alt: "media"
            });
          },
          openFile: function (fileMeta) {
            this.blockingLoading = true;
            this.blockingLoadingText = "Opening file " + fileMeta.filename + "...";
            return Promise.all([
              this.getFile(fileMeta.fileId),
              this.getFileMeta(fileMeta.fileId)
            ]).then(resp => {
              console.log(resp);
              this.gantts.splice(0, this.gantts.length);
              this.$nextTick(() => { 
                this.gantts.push(...resp[0].result); 
                this.$nextTick(() => { this.contentChanged = false; });
              });
              this.updateQueryString(resp[1].result.id);
              this.currentFile.name = resp[1].result.name;
              this.currentFile.id = resp[1].result.id;
              this.currentFile.parents = resp[1].result.parents ? resp[1].result.parents : [];
              this.currentFile.isAppAuthorized = resp[1].result.isAppAuthorized;
              this.blockingLoadingText = "Loaded file " + this.currentFile.name;
              setTimeout(() => { this.blockingLoading = false; }, 1000);
            }, resp => {
              console.log(resp);
              this.blockingLoadingText = "Failed to open " + fileMeta.filename;
              setTimeout(() => { this.blockingLoading = false; }, 1000);
            });
          },
          updateQueryString: function (fileId) {
            documentTitle = typeof documentTitle !== 'undefined' ? documentTitle : document.title;
            let searchParams = new URLSearchParams();
            searchParams.set('file', fileId);
            searchParams.set('user', this.user.id);
            searchParams.set('action', 'open');
            let urlSplit=( window.location.href ).split( "?" );
            let obj = { title: document.title, url: urlSplit[0] + "?" + searchParams.toString() };      
            history.pushState(obj, obj.title, obj.url);
          },
          autosave: function () {
            if (this.contentChanged && this.isSignedIn && this.currentFile.id && this.currentFile.isAppAuthorized) { this.updateCurrentFile(); }
            setTimeout(this.autosave, 20000);
          },
          openPrivacyPolicy: function () {
            window.open("./privacypolicy.php", "_blank");
          },
          updateHash: function (i) {
            location.hash = "gc" + i;
          },
          reorderTask: function (taskIds, gci) {
            let taskIdToMove = JSON.parse(taskIds[0]);
            let taskIdToPrepend = JSON.parse(taskIds[1]);
            console.log(gci, taskIdToMove, taskIdToPrepend);
            let taskToMove;
            taskIdToMove.forEach((id,i,arr) => {
              if (i == 0) { 
                if (i == arr.length - 1) { taskToMove = this.gantts[gci].tasks.splice(id,1); } 
                else { taskToMove = this.gantts[gci].tasks[id]; }
              } else { 
                if (i == arr.length - 1) { taskToMove = taskToMove.subtasks.splice(id,1); } 
                else { taskToMove = taskToMove.subtasks[id]; }
              }
            });
            taskToMove = taskToMove[0];
            console.log(taskToMove);
            
            let getParentOfTaskToPrepend = (taskIdOfParent) => {
              let parentOfTask;
              if (taskIdOfParent.length > 0) {
                taskIdOfParent.forEach((id,i) => {
                  if (i == 0) { parentOfTask = this.gantts[gci].tasks[id]; }
                  else { parentOfTask = parentOfTask.subtasks[id]; }
                });
                parentOfTask = parentOfTask.subtasks;
              } else { parentOfTask = this.gantts[gci].tasks; }
              return parentOfTask;
            };

            let movel = taskIdToMove.length;
            let prepl = taskIdToPrepend.length;
            if (movel == prepl) {
              let parentOfTaskToPrepend = getParentOfTaskToPrepend(taskIdToPrepend.slice(0,-1));
              if (JSON.stringify(taskIdToMove.slice(0,-1)) == JSON.stringify(taskIdToPrepend.slice(0,-1))) {
                if (taskIdToMove[movel - 1] > taskIdToPrepend[prepl - 1]) { parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1], 0, taskToMove); } 
                else { parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1]-1, 0, taskToMove); }
              } else { parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1], 0, taskToMove); }
            } else if (movel < prepl) {
              if (JSON.stringify(taskIdToMove.slice(0,-1) == JSON.stringify(taskIdToPrepend.slice(0,movel-1)))) {
                if (taskIdToMove[movel - 1] > taskIdToPrepend[movel - 1]) { 
                  let parentOfTaskToPrepend = getParentOfTaskToPrepend(taskIdToPrepend.slice(0,-1));
                  parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1], 0, taskToMove); 
                } else if (taskIdToMove[movel - 1] < taskIdToPrepend[movel - 1]) {
                  taskIdToPrepend[movel - 1] -= 1;
                  let parentOfTaskToPrepend = getParentOfTaskToPrepend(taskIdToPrepend.slice(0,-1));
                  parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1], 0, taskToMove); 
                } else { // taskIdToMove[movel - 1] == taskIdToPrepend[movel - 1]
                  let parentOfTaskToPrepend = getParentOfTaskToPrepend(taskIdToMove.slice(0,-1));
                  parentOfTaskToPrepend.splice(taskIdToMove[movel - 1], 0, taskToMove);
                }
              }
            } else { // movel > prepl
              let parentOfTaskToPrepend = getParentOfTaskToPrepend(taskIdToPrepend.slice(0,-1));
              parentOfTaskToPrepend.splice(taskIdToPrepend[prepl - 1], 0, taskToMove); 
            }
          },
          removeGantt: function (gci) {
            this.gantts.splice(gci, 1);
            this.updateGantts();
          },
          updateGantts: function () {
            this.$nextTick(() => {
              this.$refs.gc.forEach(g => g.initiate());
            });
          },
          openSite: function (site) {
            window.open(site, "_blank");
          },
          startDragGanttListItem: function (ev, ganttId) { ev.dataTransfer.setData('ganttId', JSON.stringify(ganttId)); },
          dropGanttListItem: function (ev, ganttId) { 
            let droppedId = ev.dataTransfer.getData('ganttId');
            let thisId = JSON.stringify(ganttId);
            // console.log(droppedId, thisId);
            let ganttToMove = this.gantts.splice(droppedId,1)[0];
            if (droppedId >= thisId) { this.gantts.splice(thisId,0,ganttToMove); }
            else { this.gantts.splice(thisId-1,0,ganttToMove); }
            this.updateGantts();
          }
        }
      });

      
    </script>

    <!-- Google API -->
    <script src="./googleapiloader.js"></script>

    <script async defer src="//apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>        
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
  </body>
</html>